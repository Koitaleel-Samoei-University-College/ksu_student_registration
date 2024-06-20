<!doctype html>
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

            <center ><img src="https://res.cloudinary.com/homework-support-com/image/upload/v1691054617/logo_foxoai.png" width="100" height="100">
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
                    <td style="text-align: left;"><strong>Your Ref: {{$student_data->indexNumber}}</strong></td>
                    <td style="text-align: right;">
                        @if($student_data->admission_status == "Inter_University_Transfer")
                            Date: June 19, 2024
                        @else
                        <strong>Date:  May 23, 2024</strong>
                        @endif
                    </td>
                </tr>
            </table>

        <strong>
            <p>Admission Number: {{$student_data->admission_number}} </p>
            <div>{{$student_data->name}}</div>
            <div>P.O.BOX {{strtoupper($student_data->address)}} - {{$student_data->post_code}} </div>
            <div>{{$student_data->town}}. </div>
            <p>0{{$student_data->phone}}, 0{{$student_data->alternative_phone}} </p>
        <p>Dear
           @if($student_data->gender === 'M') MR @endif
           @if($student_data->gender === 'F') MS @endif
            {{strtoupper($surname)}},</p>
        </strong>

        <p class="text-decoration-underline"> <strong>ADMISSION INTO THE UNIVERSITY COLLEGE FOR 2024/2025 ACADEMIC YEAR  </strong> </p>
        <p>
        <p>Following your application for admission to undertake undergraduate studies, I am pleased to inform you that you have been offered admission to <strong>Koitaleel Samoei University College (KSUC) </strong>, in the <strong>
                {{strtoupper($school->school_name)}}</strong> for a course leading to the degree of <strong>{{strtoupper($student_data->program)}}</strong></p>

            <p>This offer is made on the basis of the copies of the certificates, which you presented with your application. You should therefore bring with you the originals for verification on the registration day.  Please note that any information found to be untrue/incorrect will automatically lead to your disqualification and expulsion from the College. The College also reserves the right to report you to the relevant government agents for action.</p>

            <p>You will be required to report physically on <strong> Monday August 19, 2024 </strong> between 8.00 a.m. to 5.00 p.m.</p>
            <p>The offer is also subject to your acceptance of the following conditions:</p>
           <ol>
               <li>To adhere to Covid-19 Precautions at all times.</li>
               <li>To adhere to the College Rules and Regulations.</li>
               <li>To pay the required tuition fees and other expenses through E–citizen using the procedures detailed in the Joining Instructions Form JI/6A.</li>
               <li>To use the Library facilities responsibly and purchase all the textbooks and other materials prescribed for the course units in which you are enrolled.</li>
               <li>To provide original certificates and certified copies for verification.</li>
               <li>Identify yourself by producing your original National ID Card/passport/ Birth certificate</li>
               <li>Your execution of the Bond.</li>
               <li>Provide evidence of your registration with the National Hospital insurance Fund (NHIF)</li>
           </ol>
    <div class="page-break"></div>
            <br/>
        <strong>Fees Payment</strong>
            <ol>
                <li>Following your placement in this institution, you are eligible to apply for a Government scholarship, loan and bursary to assist you with your educational expenses.</li>
                <li>If you require government financial support, you MUST make an application for consideration through the official scholarship and loan application portal <span style="color: #0000FF;">https//www.hef.co.ke/</span></li>
                <li>Should the Government scholarship, loan and bursary not be sufficient to cover the entire cost of your programme, the remaining fee balance will be the responsibility of your parent/guardian.</li>
                <li>Fees payable for this Programme will be
                    @if($student_data->program == strtoupper("Bachelor of Arts"))
                        <strong> <u>Ksh 122,400 /-</u></strong>
                    @else
                        <strong><u>Ksh 183,600 /-</u></strong>
                    @endif
                    per year.</li>
                <li>All fees shall be paid through the E-citizen portal, by logging into the student portal.</li>
            </ol>
        <strong>Accommodation</strong>
            <ol>
                <li>Please note that admission to the College does not guarantee you admission in the Halls of Residence. You will, therefore be required to make your private accommodation arrangements should you not be offered College accommodation.
                <li>The College has very limited accommodation on campus but there is external accommodation on offer in the college vicinity.
            </ol>
        <strong> Learning device </strong>
            <p>The Covid-19 pandemic has led to the University adopting blended Teaching and Learning and therefore all students are requested to carry along a laptop with a Webcam. </p>
        <strong>Acceptance of offer</strong>
           <p> If you accept this offer on these conditions, please sign the acceptance letter JI/1A and return it to the Academic Registrar on the day of registration.  Should you decline the offer, please complete form JI/1B of the Joining Instructions and email it to the Academic Registrar immediately.</p>
            <p>You will obtain Joining Instructions and the Bond for your information and necessary action on the following link <span style="color: #0000FF;">https://ksu.ac.ke/ </span> Joining Instructions duly executed should be returned to the College along with the Acceptance Form on the day of reporting. You are further advised to check regularly on your email and University Website for further guidance.</p>

            <p>I take this opportunity to congratulate you on this achievement, and look forward to welcoming you to Koitaleel Samoei University College.</p>

            <p>Yours sincerely,</p>

            @if($student_data->admission_status == "Inter_University_Transfer")
                <img src="https://res.cloudinary.com/homework-support-com/image/upload/v1718903866/Screenshot_from_2024-06-20_20-11-05-removebg-preview_lrhapm.png" width="150" height="120">
            @else
        <img src="https://res.cloudinary.com/homework-support-com/image/upload/v1716479290/signatureKsu_tk8xra.jpg" width="150" height="120">
            @endif
        <strong>
        <div>CS JOHN NGIGI </div>
        <div>DEPUTY REGISTRAR ACADEMIC </div>
        </strong>
            <p>Encls.</p>

        </p>
    </div>

</body>
</html>
