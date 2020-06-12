@extends('layouts.front')
@section('content')
        <style>

            #form_container
            {
                padding:15px 15px;
                margin-top:15px;
                background: rgba(0,0,0,0.5);	
                color:#fff;
            }
            body
            {
                background-color: #000;
                background-image: url("uploads/stduio-2035349_1280.jpg");
                background-size: cover;
                background-repeat:no-repeat;

            }
             

            .upload-btn-wrapper input[type=file] 
            {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            }


    </style>
        <div id="success" style="text-align: center"></div>
            <div class="row">
                <div class="col-md-6 " id="form_container">
                    <h2>Contact Us</h2> 
                    <p> Please send your message below. We will get back to you at the earliest! </p>
                    <form  id="ContactUs">
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="message"> Message:</label>
                                <textarea class="form-control" required type="textarea" id="message" name="message" maxlength="6000" rows="7"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="name"> Your Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="email"> Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button type="submit" class="btn btn-success btn-default pull-right" >Send &rarr;</button>
                            </div>
                        </div>
                    </form>
                    <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Posted your message successfully!</h3> </div>
                    <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div>
                </div>
            </div>
    @endsection