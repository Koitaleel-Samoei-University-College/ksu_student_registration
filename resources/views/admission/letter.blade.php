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
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
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

            <center ><img src="logo.png" width="100" height="100">
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
                    <td style="text-align: right;"><strong>Date:  August 1, 2023</strong></td>
                </tr>
            </table>

        <strong>
            <p>Our Ref: {{$student_data->admission_number}} </p>
            <div>{{$student_data->name}}</div>
            <div>P.O.BOX {{strtoupper($student_data->address)}} - {{$student_data->post_code}} </div>
            <div>{{$student_data->town}}. </div>
            <p>0{{$student_data->phone}}, 0{{$student_data->alternative_phone}} </p>
        <p>Dear
           @if($student_data->gender === 'M') MR @endif
           @if($student_data->gender === 'F') MS @endif
            {{strtoupper($surname)}},</p>
        </strong>

        <p class="text-decoration-underline"> <strong>ADMISSION INTO THE UNIVERSITY COLLEGE FOR 2023/2024 ACADEMIC YEAR  </strong> </p>
        <p>
        <p>Following your application for admission to undertake undergraduate studies, I am pleased to inform you that you have been offered admission to <strong>Koitaleel Samoei University College (KSUC) </strong>, in the School of <strong>
                {{strtoupper($school->school_name)}}</strong> for a course leading to the degree of <strong>{{strtoupper($student_data->program)}}</strong></p>

            <p>This offer is made on the basis of the copies of the certificates, which you presented with your application. You should therefore bring with you the originals for verification on the registration day.  Please note that any information found to be untrue/incorrect will automatically lead to your disqualification and expulsion from the College. The College also reserves the right to report you to the relevant government agents for action.</p>

            <p>You will be required to report physically on <strong> Monday September 25, 2023 </strong> between 8.00 a.m. to 5.00 p.m.</p>
            <p>The offer is also subject to your acceptance of the following conditions:</p>
           <ol>
               <li>To adhere to Covid-19 Precautions at all times.</li>
               <li>To adhere to the College Rules and Regulations.</li>
               <li>To pay the required tuition fees and other expenses as detailed in the Joining Instructions Form JI/6A.</li>
               <li>To use the Library facilities responsibly and purchase all the textbooks and other materials prescribed for the course units in which you are enrolled.</li>
               <li> To strictly abide by the rules and regulations given by the Catering and Accommodation Services (CAS) as detailed in Form J1/7A and JI/7B, if you choose to stay in the College accommodation.</li>
               <li>To provide original certificates and certified copies for verification.</li>
               <li>Identify yourself by producing your original National ID Card/passport/ Birth certificate</li>
               <li>Your execution of the Bond.</li>
               <li>Provide evidence of your registration with the National Hospital Insurance Fund (NHIF).</li>
           </ol>
    <div class="page-break"></div>
        <strong>Fees Payment</strong>
           <p> Following your placement in this institution, you are eligible to apply for a Government scholarship, loan and
            bursary to assist you with your educational expenses. If you require government financial support, you
               <strong>MUST </strong> make an application for consideration through the official scholarship and loan application portal
           <span style="color: blue">https//www.hef.co.ke/</span>  should the Government scholarship, loan and bursary not be sufficient to cover the
               entire cost of your programme, the remaining fee balance will be the responsibility of your parent/guardian. Fees payable for this programme will be @if($student_data->program_code == "3890101") <strong>Ksh 122,400 </strong>  @else <strong>Ksh 183,600 </strong> @endif per year.
           </p>

           <p> Fees is payable in full, before reporting for registration. All fees shall be paid by direct cash deposit to <strong>ABSA
                   BANK </strong>(formerly Barclays Bank)<strong> ELDORET BRANCH, KENYATTA STREET or any branch
            countrywide</strong>. ACCOUNT NAME: <strong> KOITALEEL SAMOEI UNIVERSITY COLLEGE: ACCOUNT
            NUMBER: 2041283338 </strong>.Personal Cheques are not acceptable. A Student shall retain the pay in bank slips as
               proof of payment and submit to the College on the day of registration. </p>
            <p> Please note that admission to the College does not guarantee you admission in the Halls of Residence. You will, therefore be required to make your private accommodation arrangements should you not be offered College accommodation.</p>

            <p> If you accept this offer on these conditions, please sign acceptance letter JI/1A and return it to the Academic Registrar on the day of registration.  Should you find yourself unable to accept this offer, please complete form JI/1B of the Joining Instructions and email it to the Academic Registrar immediately. </p>

            <p> The Covid-19 pandemic has led to the University adopting blended Teaching and Learning and therefore all students are requested to carry along a laptop with a Webcam.</p>

           <p> You will obtain Joining Instructions and the Bond for your information and necessary action on the following
               link   <span style="color: blue"> https://ksu.ac.ke/ </span> Joining Instructions duly executed should be returned to the College along with the
            Acceptance Form on <strong>Monday, September 25, 2023</strong> the day of Reporting. You are further advised to check
               regularly on your email and University Website for further guidance. </p>
           <p> I take this opportunity to congratulate you on this achievement, and look forward to welcoming you to Koitaleel
               Samoei University College.</p>
            <p>Yours sincerely,</p>

        <img src="RegistraSign.jpeg" width="200" height="120">
        <strong>
        <div>CS JOHN NGIGI </div>
        <div>DEPUTY REGISTRAR </div>
        </strong>
            <p>Encls.</p>

        </p>
    </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
