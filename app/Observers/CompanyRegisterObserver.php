<?php

namespace App\Observers;

use App\Models\company;

class CompanyRegisterObserver
{
    /**
     * Handle the company "created" event.
     *
     * @param  \App\Models\company  $company
     * @return void
     */
    public function created(company $company)
    {
        //
    }

    /**
     * Handle the company "updated" event.
     *
     * @param  \App\Models\company  $company
     * @return void
     */
    public function updated(company $company)
    {
        //
    }

    /**
     * Handle the company "deleted" event.
     *
     * @param  \App\Models\company  $company
     * @return void
     */
    public function deleted(company $company)
    {
        //
    }

    /**
     * Handle the company "restored" event.
     *
     * @param  \App\Models\company  $company
     * @return void
     */
    public function restored(company $company)
    {
        //
    }

    /**
     * Handle the company "force deleted" event.
     *
     * @param  \App\Models\company  $company
     * @return void
     */
    public function forceDeleted(company $company)
    {
        //
    }
}
