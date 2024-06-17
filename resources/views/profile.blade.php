<x-layout>
<body>
    <style>
        .ml-5 {
            margin-left: 5px;
        }
        .role-toggle {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .role-toggle .btn {
            border-radius: 0;
        }
    </style>

    <header class="bg-accent relative h-36">
        <div class="absolute bottom-0 px-5">
            <div class="text-bgc gap-5 flex flex-1 flex-col-reverse sm:flex-row justify-between items-end px=5">
                <p class="text-7xl md:text-9xl font-extrabold">profil</p>
            </div>
        </div>
    </header>
    <div class="p-10" x-data="{ role: '{{ $user->RoleId == 1 ? 'mentee' : 'mentor' }}' }">
        <div class="font-bold">Anda ingin menjadi?</div>
        <div class="mt-5">
            <form action="{{ route('save.profile', ['id' => request()->query('id')]) }}" method="POST">
                @csrf
                <div class="role-toggle flex mb-4">
                    <label @click="role = 'mentee'" :class="{ 'bg-btnprimary text-white': role === 'mentee', 'bg-btnaccent text-black': role !== 'mentee' }" class="w-1/2 text-center py-2 cursor-pointer font-bold">
                        <input type="radio" name="role" id="mentee" value="mentee" class="hidden" x-model="role">
                        Mentee
                    </label>
                    <label @click="role = 'mentor'" :class="{ 'bg-btnprimary text-white': role === 'mentor', 'bg-btnaccent text-black': role !== 'mentor' }" class="w-1/2 text-center py-2 cursor-pointer font-bold">
                        <input type="radio" name="role" id="mentor" value="mentor" class="hidden" x-model="role">
                        Mentor
                    </label>
                </div>

                <div class="mb-3">
                    <label for="fullName" class="block mb-2 font-bold">Nama lengkap:</label>
                    <input type="text" class=" w-full border-4 border-accent rounded-lg p-2" id="fullName" name="fullName" value="{{ $user->UserName }}" required>
                </div>
                <div class="mb-3">
                    <label for="whatsapp" class="block mb-2 font-bold">No WhatsApp:</label>
                    <input type="text" class=" w-full rounded-lg p-2 bg-accent text-white tracking-wide" id="whatsapp" name="whatsapp" value="{{ $user->UserPhoneNumber }}" readonly>
                </div>
                <div class="mb-3" id="subject-container" :style="{ display: role === 'mentor' ? 'block' : 'none' }" x-data="{ selectedSubject: '{{ $user->SubjectId }}' }">
                    <label class="block mb-2">Pilih topik yang anda kuasai:</label>
                    @foreach($subjects as $subject)
                        <div class="form-check mb-2">
                            <input
                                class=" mr-2 hidden"
                                type="radio"
                                id="subject{{ $subject->SubjectId }}"
                                name="subject"
                                value="{{ $subject->SubjectId }}"
                                x-model="selectedSubject"
                            >
                            <label class="form-check-label flex items-center gap-2 cursor-pointer" for="subject{{ $subject->SubjectId }}">
                                <div
                                    :class="{ 'bg-accent': selectedSubject == '{{ $subject->SubjectId }}', 'border border-accent': selectedSubject != '{{ $subject->SubjectId }}' }"
                                    class="inline-block h-5 w-5 rounded-md border-2"
                                ></div>
                                <span>{{ $subject->SubjectName }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="block mx-auto text-center bg-btnprimary hover:bg-btnsecondary text-white rounded-md px-6 py-2 text-xl">Simpan</button>
            </form>
        </div>
    </div>
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</x-layout>
