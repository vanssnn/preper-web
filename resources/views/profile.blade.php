<x-layout>
<body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-check-label {
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
        .btn-primary {
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
    </style>
    <div>Anda ingin menjadi</div>
    <div class="container mt-5">
        <form action="{{ route('save.profile', ['id' => request()->query('id')]) }}" method="POST">
            @csrf
            <div class="role-toggle">
                <input type="radio" class="btn-check" name="role" id="mentee" value="mentee" {{ $user->RoleId == 1 ? 'checked' : '' }}>
                <label class="btn btn-outline-danger {{ $user->RoleId == 1 ? 'active' : '' }}" for="mentee">Mentee</label>

                <input type="radio" class="btn-check" name="role" id="mentor" value="mentor" {{ $user->RoleId == 2 ? 'checked' : '' }}>
                <label class="btn btn-outline-danger {{ $user->RoleId == 2 ? 'active' : '' }}" for="mentor">Mentor</label>
            </div>

            <div class="mb-3">
                <label for="fullName" class="form-label">Nama lengkap:</label>
                <input type="text" class="form-control" id="fullName" name="fullName" value="{{ $user->UserName }}" required>
            </div>
            <div class="mb-3">
                <label for="whatsapp" class="form-label">No WhatsApp:</label>
                <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ $user->UserPhoneNumber }}" readonly>
            </div>
            <div class="mb-3" id="subject-container" style="{{ $user->RoleId == 2 ? '' : 'display:none;' }}">
                <label class="form-label">Pilih topik yang anda kuasai:</label>
                @foreach($subjects as $subject)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="subject{{ $subject->SubjectId }}" name="subject" value="{{ $subject->SubjectId }}" {{ $user->SubjectId == $subject->SubjectId ? 'checked' : '' }}>
                        <label class="form-check-label" for="subject{{ $subject->SubjectId }}">{{ $subject->SubjectName }}</label>
                    </div>
                @endforeach
            </div>
            <x-button>Simpan</x-button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</x-layout>
