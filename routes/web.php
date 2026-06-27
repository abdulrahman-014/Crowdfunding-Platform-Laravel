<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;

Route::get('/', [CampaignController::class, 'index']);

Route::resource('campaigns', CampaignController::class);

Route::post('/campaigns/{campaign}/donate', [DonationController::class, 'store'])
    ->name('campaigns.donate');