<?php
/**
 * Created by PhpStorm.
 * User: jhtan
 * Date: 1/7/15
 * Time: 12:43 PM
 */

class Claim extends Eloquent {
  /**
   * The database table used by the model.
   *
   * @var string
   */

  protected $table = 'claim';

    public function ClaimWorkCategory() {
        return $this->belongsTo('ClaimWorkCategory', 'claimWorkCategoryId');
    }

    public function User() {
        return $this->belongsTo('User', 'userId');
    }
} 