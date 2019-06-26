<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function commissions(){
        return $this->hasMany('App\Commission');
    }

    public function manager() {
        return $this->user_commissions(1);
    }

    public function supervisor() {
        return $this->user_commissions(2);
    }

    public function salesrep() {
        return $this->user_commissions(3);
    }

    public function user_commissions($user_type) {
        $commissions = $this->commissions;
        $outercommission = null;
        foreach($commissions as $commission) {
            if ($commission->user->user_type_id == $user_type)
                $outercommission = $commission;
        }
        return $outercommission;
    }
}
