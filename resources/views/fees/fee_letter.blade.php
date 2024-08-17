<!doctype html>
<html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        div.center {
            display: flex;
            justify-content: center;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>

            <center ><img src="https://res.cloudinary.com/homework-support-com/image/upload/v1691054617/logo_foxoai.png" width="80" height="80">
            <strong>
               <div class="center"  > KOITALEEL SAMOEI UNIVERSITY COLLEGE</div>
               <div class="center" > (A Constituent College of the University of Nairobi)</div>
                <br>
               <div class="center" > OFFICE OF THE ACADEMIC REGISTRAR</div>
            </strong>
            </center>
            <p>
            <div>P.O. Box 5 - 30307,</div>
            <div>MOSORIOT, KENYA</div>
            <div>TELEPHONE: 0740 183 955/ 020-4915316/ 020-4915324</div>
            <div>Email:admissions@ksu.ac.ke / regacademic@ksu.ac.ke</div>
            <div>Website: www.ksu.ac.ke</div>
            </p>

            <br>
            <table style="width: 100%;">
                <tr>
                    <td style="text-align: left;"><strong>Ref: {{$admission->admission_number}}</strong></td>
                    <td style="text-align: right;">
                        <strong>Date:  August 15, 2024</strong>
                    </td>
                </tr>
            </table>
            <br/>
            <div><strong>{{$student->name}}</strong></div>
            <div><strong>P.O.BOX {{strtoupper($student->address)}} - {{$student->post_code}} </strong></div>
            <div><strong>{{$student->town}}. </strong></div>
{{--            <p><strong>0{{$student->phone}}, 0{{$student->alternative_phone}}</strong> </p>--}}
        <p><strong>Dear </strong>
        @if($student->gender === 'M')<strong> MR </strong> @endif
           @if($student->gender === 'F') <strong>MS </strong> @endif
            <strong>{{strtoupper(end($surname))}},        </strong>
        </p>

        <p class="text-decoration-underline"> <strong>RE: FEES PAYMENT  </strong> </p>
          <p> We are pleased to inform you that following your successful application for funding, the Higher
            Education Fund (HEF) has categorized and placed you in <strong>{{$fees->band}}</strong>. This placement means that your household will contribute <strong> KES {{$fees->household_contribution}}</strong> per year towards your fees for the <strong>{{strtoupper($student->program)}}</strong>. The fees will be paid in two (2) installments as follows:
           </p>

           <p> i. Semester I:  KES  {{$fees->household_contribution/2}} </p>
            <p>  ii. Semester II: KES  {{$fees->household_contribution/2}} </p>

            <p>For further details on your government scholarship, loan and upkeep allocation, please visit your HEF portal at <span style="color: #0000FF;">www.hef.co.ke.</span> </p>

            <p>Please be advised that your Academic Programme will commence on <strong>September 2, 2024</strong>. However, you are expected to report for registration and orientation as from <strong>August 19, 2024</strong>.</p>

            <p>As communicated in your admission letter, you are advised to regularly check the University Website for any updates regarding your studentship.</p>

            <p>We look forward to welcoming you to Koitaleel Samoei University College. </p>

            <p>Yours sincerely,</p>

            <img src="https://res.cloudinary.com/homework-support-com/image/upload/v1723912084/fee_stamp.png" width="100" height="90">

        <div>CS JOHN NGIGI </div>
        <div>DEPUTY REGISTRAR ACADEMIC </div>

</body>
</html>
