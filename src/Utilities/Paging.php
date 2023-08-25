<?php

namespace Utilities;

use \Views\Renderer;

class Paging
{
  private static function getPages(int $totalElements, int $itemsPerPage, int $currentPage, string $url)
  {
    $pages = [];
    $pagesCount = ceil($totalElements / $itemsPerPage);
    if ($pagesCount < 1) {
      return [];
    }
    if ($pagesCount <= 7) {
      foreach (range(1, $pagesCount) as $page) {
        $pages[] = [
          'url' => $url . '&pageNum=' . $page,
          'page' => $page,
          'active' => $page == $currentPage
        ];
      }
    } else {
      if ($currentPage < 3 || $currentPage > $pagesCount - 3) {
        foreach (range(1, 3) as $page) {
          $pages[] = [
            'url' => $url . '&pageNum=' . $page,
            'page' => $page,
            'active' => $page == $currentPage
          ];
        }
        $pages[] = [
          'url' => '',
          'page' => "...",
          'active' => false
        ];
        foreach (range($pagesCount - 2, $pagesCount) as $page) {
          $pages[] = [
            'url' => $url . '&pageNum=' . $page,
            'page' => $page,
            'active' => $page == $currentPage
          ];
        }
      } else {
        $pages[] = [
          'url' => $url . '&pageNum=1',
          'page' => 1,
          'active' => false
        ];
        $pages[] = [
          'url' => '',
          'page' => "...",
          'active' => false
        ];
        foreach (range($currentPage - 1, $currentPage + 1) as $page) {
          $pages[] = [
            'url' => $url . '&pageNum=' . $page,
            'page' => $page,
            'active' => $page == $currentPage
          ];
        }
        $pages[] = [
          'url' => '',
          'page' => "...",
          'active' => false
        ];
        $pages[] = [
          'url' => $url . '&pageNum=' . ($pagesCount),
          'page' => $pagesCount,
          'active' => false
        ];
      }
    }
    return $pages;
  }
  public static function getPagination(int $totalElements, int $itemsPerPage, int $currentPage, string $url, string $controler)
  {
    $pages = self::getPages($totalElements, $itemsPerPage, $currentPage, $url);
    $viewData = [
      'pages' => $pages,
      'url' => "index.php",
      'itemsPerPage' => $itemsPerPage,
      'page' => $controler
    ];
    $itemsPerPageKey = "itemsPerPage_" . $itemsPerPage;
    $viewData[$itemsPerPageKey] = "selected";
    $pagination = Renderer::render('utilities/pagination', $viewData, "utilities/blanklayout", false);
    return $pagination;
  }
}
