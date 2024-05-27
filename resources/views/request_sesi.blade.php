<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Sesi</title>
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
    </style>
</head>
<body>
    <div class="container mt-5">
        <form action="{{ route('submit.form', ['userID' => request()->query('userID')]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="fullName" class="form-label">Nama lengkap:</label>
                <input type="text" class="form-control" id="fullName" name="fullName" value="{{ $user->UserName }}" readonly>
            </div>
            <div class="mb-3">
                <label for="whatsapp" class="form-label">No WhatsApp:</label>
                <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ $user->UserPhoneNumber }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Pilih topik yang ingin anda pelajari:</label>
                @foreach($subjects as $subject)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="subject{{ $subject->SubjectId }}" name="subject" value="{{ $subject->SubjectId }}">
                        <label class="form-check-label" for="subject{{ $subject->SubjectId }}">{{ $subject->SubjectName }}</label>
                    </div>
                @endforeach
            </div>
            <div class="mb-3">
                <label for="specificTopic" class="form-label">Hal spesifik apa yang ingin anda bahas?</label>
                <input type="text" class="form-control" id="specificTopic" name="specificTopic" placeholder="Matematika Minat">
            </div>
            <div class="mb-3">
                <label class="form-label">Pilih batch untuk (dd-mm-yyyy):</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="batch1" name="batch" value="Batch 1 (07:20 - 09:00)">
                    <label class="form-check-label" for="batch1">Batch 1 (07:20 - 09:00)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="batch2" name="batch" value="Batch 2 (09:20 - 11:00)">
                    <label class="form-check-label" for="batch2">Batch 2 (09:20 - 11:00)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="batch3" name="batch" value="Batch 3 (11:20 - 13:00)">
                    <label class="form-check-label" for="batch3">Batch 3 (11:20 - 13:00)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="batch4" name="batch" value="Batch 4 (13:20 - 15:00)">
                    <label class="form-check-label" for="batch4">Batch 4 (13:20 - 15:00)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="batch5" name="batch" value="Batch 5 (15:20 - 17:00)">
                    <label class="form-check-label" for="batch5">Batch 5 (15:20 - 17:00)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="batch6" name="batch" value="Batch 6 (17:20 - 19:00)">
                    <label class="form-check-label" for="batch6">Batch 6 (17:20 - 19:00)</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Selesai</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
