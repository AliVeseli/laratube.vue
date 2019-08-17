<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChannelController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function edit(Channel $channel)
    {
        return view('channel.edit', [
                'channel' => $channel
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Channel $channel)
    {
        $channel_id = Auth::user()->channel->first()->id;
        $request->validate([
            'name' => 'required|max:255|unique:channels,name,'.$channel_id,
            'slug' => 'required|max:255|unique:channels,slug,'.$channel_id,
            'description' => 'required|max:1000',
        ]);

        $channel->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {
        //
    }
}
