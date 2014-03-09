<?php

namespace Lannor\Wedding\Controllers\Wedding;

use Lannor\Wedding\Repos\ItemRepository;
use Lannor\Wedding\Models\Item;

class WishListController extends \Lannor\Wedding\Controllers\WeddingController
{
  public function initialize() {
    $this->item_repo = new ItemRepository($this->db);
  }

  public function index() {
    $this->booked_items = $this->item_repo->allByBooked(true);
    $this->open_items   = $this->item_repo->allByBooked(false);
  }
}
