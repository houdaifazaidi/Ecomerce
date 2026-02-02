@extends('Master_page')

@section('title', 'Envoyer Email')

@section('content')
<style>
    :root {
        --navy: #001f3f;
        --success: #28a745;
        --border: #e0e6ed;
        --bg-light: #f8f9fa;
    }

    .email-section {
        width: 100%;
        padding: 40px 0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .email-header {
        width: 100%;
        max-width: 600px;
        margin-bottom: 30px;
    }

    .email-header h1 {
        color: var(--navy);
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
    }

    /* Card Container */
    .email-card {
        background: #ffffff;
        border: 1px solid var(--border);
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 31, 63, 0.08);
        width: 100%;
        max-width: 600px;
        padding: 40px;
    }

    /* Form Styling */
    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        color: var(--navy);
        font-weight: 700;
        font-size: 0.95rem;
        margin-bottom: 8px;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid var(--border);
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background-color: #fcfcfc;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--navy);
        box-shadow: 0 0 0 3px rgba(0, 31, 63, 0.1);
        background-color: #fff;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 150px;
    }

    /* Button Styling */
    .btn-send {
        background-color: var(--success);
        color: white;
        width: 100%;
        padding: 14px;
        border: none;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .btn-send:hover {
        background-color: #218838;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
    }

    .btn-send:active {
        transform: translateY(0);
    }

    /* Flash Message Container */
    .alert-container {
        width: 100%;
        max-width: 600px;
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .email-card {
            padding: 25px;
        }
    }
</style>

<div class="email-section">
    <div class="email-header">
        <h1>📧 Envoyer un Email</h1>
    </div>

    {{-- <div class="alert-container">
        @include('incs.flash')
    </div> --}}

    <div class="email-card">
        <form action="{{ route('send.email') }}" method="post">
            @csrf
            
            <div class="form-group">
                <label for="recipient_email">E-mail du destinataire</label>
                <input type="email" 
                       id="recipient_email" 
                       class="form-control" 
                       name="recipient_email" 
                       placeholder="exemple@domaine.com" 
                       required>
            </div>

            <div class="form-group">
                <label for="subject">Sujet</label>
                <input type="text" 
                       id="subject" 
                       class="form-control" 
                       name="subject" 
                       placeholder="Entrez l'objet de votre message" 
                       required>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" 
                          class="form-control" 
                          name="message" 
                          placeholder="Écrivez votre message ici..." 
                          required></textarea>
            </div>

            <button type="submit" class="btn-send">
                Envoyer le message
            </button>
        </form>
    </div>
</div>
@endsection