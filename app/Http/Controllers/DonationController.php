<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function store(Request $request, Campaign $campaign)
    {
        $request->validate([
            'donor_name' => 'required|max:255',
            'amount' => 'required|numeric|min:1'
        ]);

        Donation::create([
            'campaign_id' => $campaign->id,
            'donor_name' => $request->donor_name,
            'amount' => $request->amount
        ]);

        // تحديث إجمالي التبرعات
        $campaign->current_amount += $request->amount;
        $campaign->save();

        return redirect()->back()->with('success', 'Thank you for your donation!');
    }
}