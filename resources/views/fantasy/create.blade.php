@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Create Your Fantasy Team</h2>

    <form action="{{ route('fantasy.team.store') }}" method="POST" id="fantasy-form">
        @csrf

        <div class="row">
            <!-- Player Pool -->
            <div class="col-md-4">
                <h5>Available Players:</h5>
                <div class="alert alert-info" id="budget-display">
                    Remaining Budget: <strong>$50.00 million</strong>
                </div>

                <!-- Search Bar for Players -->
                <input type="text" id="player-search" class="form-control mb-3" placeholder="Search for players..." onkeyup="filterPlayers()">

                <div class="player-list" id="player-pool">
                    @foreach ($players as $player)
                        <div class="player-card" draggable="true" data-id="{{ $player->id }}" data-price="{{ $player->price }}">
                            <div>{{ $player->name }}</div>
                            <div>{{ $player->position }} (${{ $player->price }}m)</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Field Layout -->
            <div class="col-md-8">
                <h5>Build Your Team (Drag players into positions):</h5>
                <div class="field-layout mb-3">
                    @php
                        $positions = ['GK', 'DEF', 'DEF', 'MID', 'MID', 'MID', 'FWD'];
                    @endphp
                    @foreach ($positions as $index => $pos)
                        <div class="position-slot" data-position="{{ $pos }}">
                            {{ $pos }}
                            <input type="hidden" name="players[]" class="player-input">
                        </div>
                    @endforeach
                </div>

                <!-- Captain & Vice-Captain Selection Based on Dragged Players -->
                <div class="form-group mb-3">
                    <label for="captain">Captain:</label>
                    <select name="captain" id="captain" class="form-control" required>
                        <option value="" disabled selected>Select a captain</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="vice_captain">Vice-Captain:</label>
                    <select name="vice_captain" id="vice_captain" class="form-control" required>
                        <option value="" disabled selected>Select a vice-captain</option>
                    </select>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex flex-column flex-md-row gap-2 mt-4">
                    <button type="submit" class="btn btn-success btn-lg w-100 btn-animate">Save Team</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-lg w-100 btn-animate">Back</a>
                    @php
                        $existingTeam = \App\Models\FantasyTeam::where('user_id', auth()->id())->first();
                    @endphp
                    @if($existingTeam)
                        <a href="{{ route('fantasy.team.show', $existingTeam->id) }}" class="btn btn-primary btn-lg w-100 btn-animate">View My Team</a>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    const budgetLimit = 50;
    const budgetDisplay = document.getElementById('budget-display');
    const playerPool = document.getElementById('player-pool');
    let assignedPlayers = [];

    function updateBudget() {
        let total = 0;
        document.querySelectorAll('.position-slot .player-card').forEach(card => {
            total += parseFloat(card.dataset.price);
        });
        const remaining = (budgetLimit - total).toFixed(2);
        budgetDisplay.innerHTML = `Remaining Budget: <strong>$${remaining} million</strong>`;
        budgetDisplay.classList.toggle('alert-danger', total > budgetLimit);
        budgetDisplay.classList.toggle('alert-info', total <= budgetLimit);
    }

    function attachDragEvents(card) {
        card.addEventListener('dragstart', (e) => {
            e.dataTransfer.setData('text/plain', card.outerHTML);
            setTimeout(() => card.classList.add('dragging'), 0);
        });
        card.addEventListener('dragend', () => {
            card.classList.remove('dragging');
        });
    }

    function createRemoveButton(card) {
        const btn = document.createElement('span');
        btn.textContent = '❌';
        btn.classList.add('remove-btn');
        btn.addEventListener('click', () => {
            const slot = card.parentElement;
            const clone = card.cloneNode(true);
            clone.querySelector('.remove-btn').remove();
            playerPool.appendChild(clone);
            attachDragEvents(clone);

            assignedPlayers = assignedPlayers.filter(id => id !== card.dataset.id);
            card.remove();
            slot.querySelector('.player-input').value = '';

            updateBudget();
            updateDraggables();
            updateCaptainAndViceCaptain();
        });
        card.appendChild(btn);
    }

    function preventDuplicatePlayer(card) {
        if (assignedPlayers.includes(card.dataset.id)) {
            card.setAttribute('draggable', 'false');
            card.style.opacity = '0.5';
        } else {
            card.setAttribute('draggable', 'true');
            card.style.opacity = '1';
        }
    }

    function updateDraggables() {
        document.querySelectorAll('.player-card').forEach(card => {
            preventDuplicatePlayer(card);
        });
    }

    function updateCaptainAndViceCaptain() {
        const captainSelect = document.getElementById('captain');
        const viceCaptainSelect = document.getElementById('vice_captain');

        captainSelect.innerHTML = '<option value="" disabled selected>Select a captain</option>';
        viceCaptainSelect.innerHTML = '<option value="" disabled selected>Select a vice-captain</option>';

        assignedPlayers.forEach(id => {
            const option = document.createElement('option');
            option.value = id;
            const playerName = document.querySelector(`[data-id="${id}"]`).innerText;
            option.textContent = playerName;
            captainSelect.appendChild(option);
            viceCaptainSelect.appendChild(option.cloneNode(true));
        });
    }

    document.querySelectorAll('.player-card').forEach(card => {
        attachDragEvents(card);
        preventDuplicatePlayer(card);
    });

    document.querySelectorAll('.position-slot').forEach(slot => {
        slot.addEventListener('dragover', (e) => e.preventDefault());
        slot.addEventListener('drop', (e) => {
            e.preventDefault();
            const data = e.dataTransfer.getData('text/plain');
            const temp = document.createElement('div');
            temp.innerHTML = data;
            const newCard = temp.firstChild;

            if (!slot.querySelector('.player-card')) {
                createRemoveButton(newCard);
                slot.appendChild(newCard);
                slot.querySelector('.player-input').value = newCard.dataset.id;
                assignedPlayers.push(newCard.dataset.id);
                updateBudget();
                updateDraggables();
                updateCaptainAndViceCaptain();
            } else {
                alert('Only one player allowed per slot.');
            }
        });
    });

    function filterPlayers() {
        const searchTerm = document.getElementById('player-search').value.toLowerCase();
        document.querySelectorAll('.player-card').forEach(card => {
            const playerName = card.querySelector('div').innerText.toLowerCase();
            if (playerName.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>

<style>
    .player-card {
        border-radius: 15px;
        background: linear-gradient(45deg, #f3f4f6, #e0e0e0);
        padding: 10px;
        margin: 5px 0;
        cursor: move;
        text-align: center;
        box-shadow: 0px 10px 20px rgba(0,0,0,0.1);
        position: relative;
        transition: transform 0.2s;
    }

    .player-card:hover {
        transform: scale(1.05);
    }

    .dragging {
        opacity: 0.3;
    }

    .remove-btn {
        position: absolute;
        top: 3px;
        right: 8px;
        cursor: pointer;
        color: red;
        font-size: 16px;
    }

    .field-layout {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
        background-color: #2e7d32;
        padding: 20px;
        border-radius: 15px;
        min-height: 400px;
    }

    .position-slot {
        background: #f1f1f1;
        border: 2px dashed #bbb;
        min-height: 100px;
        padding: 10px;
        border-radius: 10px;
        text-align: center;
        font-weight: bold;
        position: relative;
    }

    .player-list {
        max-height: 600px;
        overflow-y: auto;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 10px;
    }

    .btn-animate {
        transition: background-color 0.3s ease, transform 0.3s ease;
        border-radius: 10px;
    }

    .btn-animate:hover {
        background-color: #0069d9;
        transform: scale(1.05);
    }

    .btn-animate:active {
        transform: scale(1.02);
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
    }

    .btn-lg {
        font-size: 1.2rem;
        padding: 15px;
    }
</style>
@endsection
