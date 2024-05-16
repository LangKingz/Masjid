<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Distext extends Component
{
    /**
     * define public variable
     */
    public $text, $text_id, $update = false, $add = false;
    #[On('text-updated')]
    public function dataUpdated()
    {

    }

    /**
     * List of add/edit form rules
     */
    protected $rules = [
        'text' => 'required',
    ];
    /**
     * Reseting all inputted fields
     * @return void
     */
    public function resetFields()
    {
        $this->text = '';
    }

    /**
     * render the post data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $display_text = \App\Models\Distext::latest()->get();
        return view('livewire.distext', compact('display_text'));
    }

    /**
     * Open Add Post form
     * @return void
     */
    public function create()
    {
        $this->resetFields();
        $this->add = true;
        $this->update = false;
    }

    /**
     * store the user inputted post data in the posts table
     * @return void
     */
    public function store()
    {
        $this->validate();
        try {
            \App\Models\Distext::create([
                'text' => $this->text
            ]);

            session()->flash('success', 'Post Created Successfully!!');
            $this->resetFields();
            $this->add = false;
            $this->dispatch('text-updated');
        } catch (\Exception $ex) {
            session()->flash('error', 'Something goes wrong!!');
        }
    }

    /**
     * show existing post data in edit post form
     * @param mixed $id
     * @return void
     */
    public function edit($id)
    {
        try {
            $display_text = \App\Models\Distext::findOrFail($id);
            if (!$display_text) {
                session()->flash('error', 'Post not found');
            } else {
                $this->text = $display_text->text;
                $this->text_id = $display_text->id;
                $this->update = true;
                $this->add = false;
            }
        } catch (\Exception $ex) {
            session()->flash('error', 'Something goes wrong!!');
        }

    }

    /**
     * update the post data
     * @return void
     */
    public function update()
    {
        $this->validate();
        try {
            \App\Models\Distext::whereId($this->text_id)->update([
                'text' => $this->text
            ]);
            session()->flash('success', 'Post Updated Successfully!!');
            $this->resetFields();
            $this->update = false;
        } catch (\Exception $ex) {
            session()->flash('error', 'Something goes wrong!!');
        }
    }

    /**
     * Cancel Add/Edit form and redirect to post listing page
     * @return void
     */
    public function cancel()
    {
        $this->add = false;
        $this->update = false;
        $this->resetFields();
    }

    /**
     * delete specific post data from the posts table
     * @param mixed $id
     * @return void
     */
    public function destroy($id)
    {
        try {
            \App\Models\Distext::find($id)->delete();
            session()->flash('success', "Post Deleted Successfully!!");
        } catch (\Exception $e) {
            session()->flash('error', "Something goes wrong!!");
        }
    }
}
