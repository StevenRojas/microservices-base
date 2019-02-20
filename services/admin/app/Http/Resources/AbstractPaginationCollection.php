<?php
/**
 * Created by PhpStorm.
 * User: steven.rojas
 * Date: 2/14/19
 * Time: 9:28 PM
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AbstractPaginationCollection extends ResourceCollection {
  protected $links = [];
  protected $meta = [];

  public function __construct($resource, $addPerPage) {
    $perPage = $resource->perPage();
    $this->links = [
      'first' => $this->addPerPage($resource->url(1), $addPerPage, $perPage),
      'last' => $this->addPerPage($resource->url($resource->lastPage()), $addPerPage, $perPage),
      'prev' => $this->addPerPage($resource->previousPageUrl(), $addPerPage, $perPage),
      'next' => $this->addPerPage($resource->nextPageUrl(), $addPerPage, $perPage)
    ];
    $this->meta = [
      'current_page' => $resource->currentPage(),
      'from' => $resource->firstItem(),
      'to' => $resource->lastItem(),
      'last_page' => $resource->lastPage(),
      'per_page' => $perPage,
      'total' => $resource->total(),
      'more_pages' => $resource->hasMorePages(),

    ];
    $resource = $resource->getCollection();
    parent::__construct($resource);
  }

  private function addPerPage($url, $addPerPage, $perPage) {
    if ($addPerPage) {
      return $url . "&per_page=" . $perPage;
    }
    return $url;
  }
}