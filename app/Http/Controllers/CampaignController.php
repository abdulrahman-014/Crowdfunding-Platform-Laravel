<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaigns = Campaign::latest()->get();
        return view('campaigns.index', compact('campaigns'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
                return view('campaigns.create');

        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'goal_amount' => 'required|numeric',
        'deadline' => 'required|date',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $imageName = null;

    if ($request->hasFile('image')) {

        $imageName = $request->file('image')
                             ->store('campaigns', 'public');

    }

    Campaign::create([

        'title' => $request->title,

        'description' => $request->description,

        'goal_amount' => $request->goal_amount,

        'current_amount' => 0,

        'deadline' => $request->deadline,

        'image' => $imageName

    ]);

    return redirect()
            ->route('campaigns.index')
            ->with('success','Campaign Added Successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(Campaign $campaign)
{
    $donations = $campaign->donations()->latest()->get();

    return view('campaigns.show', compact('campaign', 'donations'));
}
    /**
     * Show the form for editing the specified resource.
     */
   public function edit(Campaign $campaign)
{
    return view('campaigns.edit', compact('campaign'));
}

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Campaign $campaign)
{
    $request->validate([

        'title'=>'required',

        'description'=>'required',

        'goal_amount'=>'required|numeric',

        'deadline'=>'required'

    ]);

    if($request->hasFile('image'))
    {

        if($campaign->image)
        {
            Storage::disk('public')->delete($campaign->image);
        }

        $campaign->image = $request
                            ->file('image')
                            ->store('campaigns','public');

    }

    $campaign->title = $request->title;

    $campaign->description = $request->description;

    $campaign->goal_amount = $request->goal_amount;

    $campaign->deadline = $request->deadline;

    $campaign->save();

    return redirect('/campaigns')
            ->with('success','Campaign Updated');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campaign $campaign)
{

    if($campaign->image)
    {

        Storage::disk('public')->delete($campaign->image);

    }

    $campaign->delete();

    return redirect('/campaigns')
            ->with('success','Campaign Deleted');

}
}
