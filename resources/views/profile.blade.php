<x-layout>
<body>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <style>
        .ml-5 {
            margin-left: 5px;
        }
        .form-check-input {
            margin-top: 0;
        }
        .form-control, .form-check-input {
            border-color: #f05454;
        }
        .form-check-input:checked {
            background-color: #f05454;
            border-color: #f05454;
        }
        .role-toggle {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .role-toggle .btn {
            border-radius: 0;
        }
        .role-toggle .btn.active {
            background-color: #f05454;
            color: #fff;
        }
        .hidden-radio {
            display: none;
        }
        .custom-radio-label {
            display: inline-block;
            padding: 10px 20px;
            border: 2px solid #e3342f;
            /* border-radius: 8px; */
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
        }
        .custom-radio-label:hover {
            background-color: #e3342f;
            color: white;
        }
        .custom-radio-label.active {
            background-color: #e3342f;
            color: white;
        }
    </style>
    <header class="bg-accent relative h-36">
        <div class="absolute bottom-0 px-5">
            <div class="text-bgc gap-5 flex flex-1 flex-col-reverse sm:flex-row justify-between items-end px=5">
                <p class="text-9xl font-extrabold">profil</p>
            </div>
        </div>
    </header>
    <div class="p-10" x-data="{ role: '{{ $user->RoleId == 1 ? 'mentee' : 'mentor' }}' }">
        <div class="font-bold">Anda ingin menjadi?</div>
        <div class="container mt-5">
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
                    <label for="fullName" class="form-label block mb-2 font-bold">Nama lengkap:</label>
                    <input type="text" class="form-control w-full border-4 border-accent rounded-lg p-2" id="fullName" name="fullName" value="{{ $user->UserName }}" required>
                </div>
                <div class="mb-3">
                    <label for="whatsapp" class="form-label block mb-2 font-bold">No WhatsApp:</label>
                    <input type="text" class="form-control w-full rounded-lg p-2 bg-accent text-white tracking-wide" id="whatsapp" name="whatsapp" value="{{ $user->UserPhoneNumber }}" readonly>
                </div>
                <div class="mb-3" id="subject-container" :style="{ display: role === 'mentor' ? 'block' : 'none' }" x-data="{ selectedSubject: '{{ $user->SubjectId }}' }">
                    <label class="form-label block mb-2">Pilih topik yang anda kuasai:</label>
                    @foreach($subjects as $subject)
                        <div class="form-check mb-2">
                            <input
                                class="form-check-input mr-2 hidden-radio"
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
                <button type="submit" class=" justify-center text-center bg-btnprimary hover:bg-btnsecondary text-white rounded-md px-6 py-2 text-xl">Simpan</button>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('input[name="role"]').forEach(function(elem) {
                elem.addEventListener('change', function() {
                    var subjectContainer = document.getElementById('subject-container');
                    if (this.value === 'mentor') {
                        subjectContainer.style.display = '';
                    } else {
                        subjectContainer.style.display = 'none';
                    }
                });
            });
        });
    </script>
    <script src="//unpkg.com/alpinejs" defer></script>

</body>
</x-layout>
