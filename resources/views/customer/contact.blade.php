@extends('layout.layout')

@section('title', 'Contact Us')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Contact Us</h1>
    <p class="text-center mb-5">We're here to assist you with any inquiries or support you may need.</p>

    <!-- Contact Cards -->
    <div class="row justify-content-center g-4">
        <!-- WhatsApp -->
        <div class="col-md-3">
            <div class="card h-100 text-center p-4">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="fab fa-whatsapp fa-3x"></i>
                    </div>
                    <h4>WhatsApp Us</h4>
                    <p>Instantly connect with our representative via WhatsApp.</p>
                    <p class="text-muted small">(Kindly note that we are unable to take calls)</p>
                    <a href="https://wa.me/+60148450382" class="btn btn-dark mt-3">CHAT WITH US</a>
                </div>
            </div>
        </div>

        <!-- Call Us -->
        <div class="col-md-3">
            <div class="card h-100 text-center p-4">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="fas fa-phone fa-3x"></i>
                    </div>
                    <h4>Call Us</h4>
                    <p>Speak with us from:</p>
                    <p>9:00AM - 5:00PM, Mon - Fri</p>
                    <a href="tel:+60148450382" class="btn btn-dark mt-3">CALL US</a>
                </div>
            </div>
        </div>

        <!-- Email Us -->
        <div class="col-md-3">
            <div class="card h-100 text-center p-4">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="fas fa-envelope fa-3x"></i>
                    </div>
                    <h4>Email Us</h4>
                    <p>Reach out for any business inquiries or opportunities via email.</p>
                    <a href="mailto:info@nill.com" class="btn btn-dark mt-3">EMAIL US</a>
                </div>
            </div>
        </div>

        <!-- Locate Us -->
        <div class="col-md-3">
            <div class="card h-100 text-center p-4">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="fas fa-map-marker-alt fa-3x"></i>
                    </div>
                    <h4>Locate Us</h4>
                    <p>Find our nearby stores and visit us.</p>
                    <a href="https://maps.google.com/?q=Lot+159,+Jakel+Square,+Jalan+Munshi+Abdullah,+50100+Kuala+Lumpur" 
                       class="btn btn-dark mt-3">LOCATE US</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Business Information -->
    <div class="mt-5 pt-5 border-top">
        <h3 class="mb-4">Business Information</h3>
        <p><strong>NILL HOLDINGS SDN. BHD.</strong></p>
        <p>(Registration No. 198201008749 [104000-V])</p>
        <p>No. 37, Jalan Raja Mahmud</p>
        <p>Kampung Baru</p>
        <p>50350 Kuala Lumpur</p>
    </div>

    <!-- Map -->
    <div class="mt-5">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.7!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc49c701efeced%3A0x40323814ce89360!2sJakel+Square!5e0!3m2!1sen!2smy!4v1466366673328" 
            width="100%" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>
@endsection