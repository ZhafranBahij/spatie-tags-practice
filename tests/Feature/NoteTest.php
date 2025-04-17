<?php

use App\Models\Note;
use App\Models\User;

test('user can view notes list', function () {
    $user = User::factory()->create();
    $note = Note::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get(route('note.index'));

    $response->assertStatus(200);
    $response->assertSee($note->title);
});

test('user can create a note', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->post(route('note.store'), [
            'title' => 'Test Note',
            'description' => 'Test Description'
        ]);

    $response->assertRedirect(route('note.index'));
    $this->assertDatabaseHas('notes', [
        'title' => 'Test Note',
        'description' => 'Test Description'
    ]);
});

test('user can edit a note', function () {
    $user = User::factory()->create();
    $note = Note::factory()->create();

    $response = $this
        ->actingAs($user)
        ->put(route('note.update', $note->id), [
            'title' => 'Updated Title',
            'description' => 'Updated Description'
        ]);

    $response->assertRedirect(route('note.index'));
    $this->assertDatabaseHas('notes', [
        'id' => $note->id,
        'title' => 'Updated Title',
        'description' => 'Updated Description'
    ]);
});

test('user can delete a note', function () {
    $user = User::factory()->create();
    $note = Note::factory()->create();

    $response = $this
        ->actingAs($user)
        ->delete(route('note.destroy', $note->id));

    $response->assertRedirect(route('note.index'));
    $this->assertDatabaseMissing('notes', ['id' => $note->id]);
});