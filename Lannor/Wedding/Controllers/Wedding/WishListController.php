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

  public function update() {
    $item = $this->item_repo->find($_REQUEST['item']['id']);
    $item->booked    = $_REQUEST['item']['booked'];
    $item->invite_id = $_SESSION['invite'];
    
    $success = false;
    if($this->item_repo->save($item)) {
      $success = true;
    }

    header('Content-Type: application/json');
    echo json_encode(['success' => $success, 'status' => ($_REQUEST['item']['booked'] == 1 ? 'booked' : 'not-booked')]);
    exit;
  }
}
