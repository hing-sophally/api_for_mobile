<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Form</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Font: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        .register-container {
            max-width: 950px;
            margin: 60px auto;
            box-shadow: 0 0 25px rgba(0,0,0,0.08);
            border-radius: 15px;
            overflow: hidden;
        }
        .form-section {
            padding: 50px 35px;
            background-color: #f9f9f9;
        }
        .banner-section {
            background: url('https://vibrantskinbar.com/wp-content/uploads/best-natural-skin-care-routine.jpg') center/cover no-repeat;
            color: #fff;
            text-align: center;
            padding: 50px 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .banner-section h2 {
            font-size: 32px;
            font-weight: 700;
            text-shadow: 0 2px 5px rgba(0,0,0,0.4);
        }

        .banner-section h5 {
            font-size: 18px;
            font-weight: 500;
            text-shadow: 0 1px 3px rgba(0,0,0,0.4);
        }

    </style>
</head>
<body>
    <div class="container ">
         @if(session('success'))
            <div class="alert alert-success mt-3"id="success-message" >
                {{ session('success') }}
            </div>
        @endif
    </div>
<div class="container register-container d-flex">

    <!-- Form Section -->
    <div class="form-section col-md-6">
        <h3 class="mb-4">Sign up</h3>
        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control rounded-3" required>
            </div>

            <div class="mb-3">
                <label class="form-label">E-mail address</label>
                <input type="email" name="email" class="form-control rounded-3" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Create password</label>
                <input type="password" name="password" class="form-control rounded-3" required>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" required>
                <label class="form-check-label">I agree to terms and conditions</label>
            </div>

            <button type="submit" class="btn btn-success w-100 rounded-pill">REGISTER</button>

            <div class="text-center my-3">or</div>

            <button type="button" class="btn btn-outline-dark w-100 mb-2 rounded-pill btn-google">
                <i class="bi bi-google"></i> Sign up with Google
            </button>

            <button type="button" class="btn btn-outline-primary w-100 mb-3 rounded-pill btn-facebook">
                <i class="bi bi-facebook"></i> Sign up with Facebook
            </button>

            <div class="text-center">
                <small>Already have an account? <a href="/login">Log in</a></small>
            </div>
        </form>
    </div>

    <!-- Banner Section -->
    <div class="banner-section col-md-6 d-flex flex-column justify-content-center align-items-center">
        <h5>Join our online</h5>
        <h2>Bio-skincare Fair 2024</h2>
    </div>
</div>

<!-- Bootstrap JS (optional for dropdowns etc) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
        // When the page loads
        window.addEventListener('DOMContentLoaded', () => {
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
        // Wait 1 second (1000ms), then fade out
        setTimeout(() => {
        successMessage.style.transition = "opacity 0.5s ease";
        successMessage.style.opacity = "0";
        // Optional: remove from DOM after fade
        setTimeout(() => successMessage.remove(), 500);
    }, 1000);
    }
    });
</script>
</body>
</html>
