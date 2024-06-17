<x-layout>
<head>
    <style>
        .form-check-label {
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <header class="bg-accent relative h-36">
        <div class="absolute bottom-0 px-5">
            <div class="text-bgc gap-5 flex flex-1 flex-col-reverse sm:flex-row justify-between items-end px=5">
                <p class="text-7xl md:text-9xl font-extrabold">permintaan sesi</p>
            </div>
        </div>
    </header>
    <div class="m-10">
        <form action="{{ route('submit.form', ['userID' => request()->query('userID')]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="fullName" class="block font-bold py-2">Nama lengkap:</label>
                <input type="text" class=" w-full rounded-lg p-2 bg-accent text-white tracking-wide" id="fullName" name="fullName" value="{{ $user->UserName }}" readonly>
            </div>
            <div class="mb-3">
                <label for="whatsapp" class="block font-bold py-2">No WhatsApp:</label>
                <input type="text" class=" w-full rounded-lg p-2 bg-accent text-white tracking-wide" id="whatsapp" name="whatsapp" value="{{ $user->UserPhoneNumber }}" readonly>
            </div>

            <div x-data="{ selectedSubject: null }" class="mb-3">
                <label class=" font-bold block mb-2">Pilih topik yang ingin anda pelajari:</label>
                @foreach($subjects as $subject)
                    <div class="mb-2">
                        <input
                            class="mr-2 hidden"
                            type="radio"
                            id="subject{{ $subject->SubjectId }}"
                            name="subject"
                            value="{{ $subject->SubjectId }}"
                            x-model="selectedSubject"
                        >
                        <label class="flex items-center gap-2 cursor-pointer" for="subject{{ $subject->SubjectId }}">
                            <div
                                :class="{ 'bg-accent': selectedSubject == '{{ $subject->SubjectId }}', 'border border-accent': selectedSubject != '{{ $subject->SubjectId }}' }"
                                class="inline-block h-5 w-5 rounded-md border-2"
                            ></div>
                            <span>{{ $subject->SubjectName }}</span>
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="mb-3">
                <label for="specificTopic" class="block font-bold py-2">Hal spesifik apa yang ingin anda bahas?</label>
                <input type="text" class=" w-full rounded-lg p-2 border-accent border-4 tracking-wide" id="specificTopic" name="specificTopic" placeholder="Matematika Minat">
            </div>
            <div x-data="{ selectedBatch: null }" class="mb-3">
                <label class=" font-bold py-2">Pilih batch untuk tanggal {{ date('d-m-Y', strtotime('+1 day')) }}:</label>
                <div class="form-check mb-2">
                    <input class=" hidden" type="radio" id="batch1" name="batch" value="Batch 1 (07:20 - 09:00)" x-model="selectedBatch">
                    <label class="form-check-label flex items-center gap-2 cursor-pointer" for="batch1">
                        <div :class="{ 'bg-accent': selectedBatch == 'Batch 1 (07:20 - 09:00)', 'border border-accent': selectedBatch != 'Batch 1 (07:20 - 09:00)' }" class="inline-block h-5 w-5 rounded-md border-2"></div>
                        <span>Batch 1 (07:20 - 09:00)</span>
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class=" hidden" type="radio" id="batch2" name="batch" value="Batch 2 (09:20 - 11:00)" x-model="selectedBatch">
                    <label class="form-check-label flex items-center gap-2 cursor-pointer" for="batch2">
                        <div :class="{ 'bg-accent': selectedBatch == 'Batch 2 (09:20 - 11:00)', 'border border-accent': selectedBatch != 'Batch 2 (09:20 - 11:00)' }" class="inline-block h-5 w-5 rounded-md border-2"></div>
                        <span>Batch 2 (09:20 - 11:00)</span>
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class=" hidden" type="radio" id="batch3" name="batch" value="Batch 3 (11:20 - 13:00)" x-model="selectedBatch">
                    <label class="form-check-label flex items-center gap-2 cursor-pointer" for="batch3">
                        <div :class="{ 'bg-accent': selectedBatch == 'Batch 3 (11:20 - 13:00)', 'border border-accent': selectedBatch != 'Batch 3 (11:20 - 13:00)' }" class="inline-block h-5 w-5 rounded-md border-2"></div>
                        <span>Batch 3 (11:20 - 13:00)</span>
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class=" hidden" type="radio" id="batch4" name="batch" value="Batch 4 (13:20 - 15:00)" x-model="selectedBatch">
                    <label class="form-check-label flex items-center gap-2 cursor-pointer" for="batch4">
                        <div :class="{ 'bg-accent': selectedBatch == 'Batch 4 (13:20 - 15:00)', 'border border-accent': selectedBatch != 'Batch 4 (13:20  - 15:00)' }" class="inline-block h-5 w-5 rounded-md border-2"></div>
                        <span>Batch 4 (13:20 - 15:00)</span>
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class=" hidden" type="radio" id="batch5" name="batch" value="Batch 5 (15:20 - 17:00)" x-model="selectedBatch">
                    <label class="form-check-label flex items-center gap-2 cursor-pointer" for="batch5">
                        <div :class="{ 'bg-accent': selectedBatch == 'Batch 5 (15:20 - 17:00)', 'border border-accent': selectedBatch != 'Batch 5 (15:20 - 17:00)' }" class="inline-block h-5 w-5 rounded-md border-2"></div>
                        <span>Batch 5 (15:20 - 17:00)</span>
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class=" hidden" type="radio" id="batch6" name="batch" value="Batch 6 (17:20 - 19:00)" x-model="selectedBatch">
                    <label class="form-check-label flex items-center gap-2 cursor-pointer" for="batch6">
                        <div :class="{ 'bg-accent': selectedBatch == 'Batch 6 (17:20 - 19:00)', 'border border-accent': selectedBatch != 'Batch 6 (17:20 - 19:00)' }" class="inline-block h-5 w-5 rounded-md border-2"></div>
                        <span>Batch 6 (17:20 - 19:00)</span>
                    </label>
                </div>
            </div>
            <button type="submit" class="block mx-auto bg-btnprimary hover:bg-btnsecondary text-white rounded-md px-6 py-2 text-xl">Selesai</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

</body>
</x-layout>
