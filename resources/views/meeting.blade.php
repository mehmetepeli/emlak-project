<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Appoinment Form</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        #meeting_form {
            width: 600px;
            min-height: 100px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        #meeting_form > #mf__headerTitle {
            width: 100%;
            height: 30px;
            font-weight: 700;
            font-size: 20px;
            color: #fff;
            text-align: center;
        }

        #meeting_form > .mf__row {
            width: 49%;
            height: 60px;
            display: flex;
            margin: 0 0 10px 0;
            padding: 5px;
            flex-direction: column;
            border: 1px solid #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        #meeting_form > .mf__row > .mf__title {
            width: 100%;
            margin: 0;
            padding: 0;
            font-weight: 400;
            font-size: 14px;
            color: #fff;
        }

        #meeting_form > .mf__row > input[type="text"],input[type="email"] {
            width: 100%;
            height: 40px;
            font-weight: 400;
            font-size: 13px;
            color: #fff;
            background: none;
            outline: none;
        }

        .mf__btnRow {
            width: 100%;
            display: flex;
            flex-direction: row;
        }

        .mf__btnRow > #mf__saveBtn {
            width: 100px;
            height: 40px;
            border: none;
            font-weight: 600;
            font-size: 14px;
            color: #000;
            border-radius: 4px;
            background-color: #fff;
            outline: none;
            cursor: pointer;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyBiuHrZiE_YLvTUJo0EYGRaTKtoa_Uoyb4&libraries=places" type="text/javascript"></script>
    <script>
        $(function() {
            var baseURL = "http://127.0.0.1:8000/";
            var meet_form = $('#meeting_form');

            $(meet_form).on('submit', function (e) {
                e.preventDefault();
                var from_location = $('#from_location').val();
                var to_location = $('#to_location').val();
                var client_name = $('#client_name').val();
                var client_surname = $('#client_surname').val();
                var client_email = $('#client_email').val();
                var client_phone = $('#client_phone').val();
                var meet_date = $('#meet_date').val();
                var meet_time = $('#meet_time').val();
                var agent_id = $('#agent_id').val();
                var distance = $('#distance').val();

                $.ajax({
                    type: "POST",
                    url: baseURL+"meet_save",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "from_location" : from_location,
                        "to_location" : to_location,
                        "client_name" : client_name,
                        "client_surname" : client_surname,
                        "client_email" : client_email,
                        "client_phone" : client_phone,
                        "meet_date" : meet_date,
                        "meet_time" : meet_time,
                        "agent_id" : agent_id,
                        "distance" : distance
                    },
                    cache: false,
                    success: function(result){
                        console.log(result);
                        var response = $.parseJSON(result);

                        if(response.action === 'OK') {
                            alert('Successfully, saved appointment !');
                            location.reload();
                            $(meet_form).trigger('reset');
                        } else {
                            alert('Error, try again after few minutes !');
                            location.reload();
                        }
                    }
                });
            });
        });
    </script>
</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <form id="meeting_form">
            <h1 id="mf__headerTitle">Appoinment Form</h1>
            <label class="mf__row" for="from_location">
                <p class="mf__title">Your Location (Post Code)</p>
                <input type="text" id="from_location" name="from_location" placeholder="Your Location" required/>
            </label>
            <label class="mf__row" for="to_location">
                <p class="mf__title">Where you want to go ? (Post Code)</p>
                <input type="text" id="to_location" name="to_location" placeholder="Where you want to go ?" required/>
            </label>
            <label class="mf__row" for="client_name">
                <p class="mf__title">Client Name</p>
                <input type="text" id="client_name" name="client_name" placeholder="Client Name" required/>
            </label>
            <label class="mf__row" for="client_surname">
                <p class="mf__title">Client Surname</p>
                <input type="text" id="client_surname" name="client_surname" placeholder="Client Surname" required/>
            </label>
            <label class="mf__row" for="client_email">
                <p class="mf__title">Client E-Mail</p>
                <input type="email" id="client_email" name="client_email" placeholder="Client E-Mail" required/>
            </label>
            <label class="mf__row" for="client_phone">
                <p class="mf__title">Client Phone</p>
                <input type="text" id="client_phone" name="client_phone" placeholder="Client Phone" required/>
            </label>
            <label class="mf__row" for="meet_date">
                <p class="mf__title">Meet Date</p>
                <input type="text" id="meet_date" name="meet_date" placeholder="Meet Date" required/>
            </label>
            <label class="mf__row" for="meet_time">
                <p class="mf__title">Meet Time</p>
                <input type="text" id="meet_time" name="meet_time" placeholder="Meet Time" required/>

                <input type="hidden" id="agent_id" name="agent_id" value="1"/>
            </label>
            <div class="mf__btnRow">
                <button id="mf__saveBtn" type="submit">SAVE</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
