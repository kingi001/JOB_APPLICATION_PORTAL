<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Curriculum Vitae</title>
    <style>
        @font-face {
            font-family: 'FuturaLT';
            src: url('{{ public_path('fonts/futura-lt/FuturaLT.ttf') }}') format('truetype');
        }

        @font-face {
            font-family: 'FuturaLT-Bold';
            src: url('{{ public_path('fonts/futura-lt/FuturaLT-Bold.ttf') }}') format('truetype');
            font-weight: bold;
        }

        body {
            font-family: 'FuturaLT', sans-serif;
            font-size: 11px;
            margin: 20px;
            background: white;
            color: #333;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #264d99;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        .personal-info div {
            margin-bottom: 5px;
            font-size: 10px;
        }

        .label {
            color: #1b3f8b;
            min-width: 100px;
            display: inline-block;
        }

        .header h1 {
            font-family: 'FuturaLT-Bold';
            font-size: 20px;
            color: #1b3f8b;
            margin: 0;
        }

        .section-title {
            font-family: 'FuturaLT-Bold';
            font-size: 14px;
            margin-top: 20px;
            color: #1b3f8b;
            border-bottom: 1px solid #ccc;
            padding-bottom: 4px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-top: 10px;
        }

        .info-grid div {
            margin-bottom: 6px;
        }

        .label {
            font-weight: bold;
            color: #1b3f8b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #e5e8eb;
            padding: 6px;
            text-align: left;
            vertical-align: top;
        }

        thead {
            background-color: #1b3f8b;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f4f6f8;
        }

        .footer {
            border-top: 2px solid #1b3f8b;
            margin-top: 30px;
            font-size: 9px;
            color: #777;
            text-align: center;
            padding-top: 8px;
        }

        .page-number::after {
            content: counter(page);
        }
    </style>
</head>

<body>
    {{-- <div class="header">
        <h1>{{ $personal->surname }} {{ $personal->other_names }}</h1>
        <p>| {{ $personal->county->county_name }} | {{ Auth::user()->email }} | {{ $personal->mobile_number }} |
            {{ $personal->postal_code }} |</p>
    </div> --}}
    {{-- <div>
        <h2 class="section-title">Personal Information</h2>
        <div><span class="label"><strong>Full Name:</strong></span> {{ $personal->surname }}
            {{ $personal->other_names }}</div>
        <div><span class="label"><strong>Email:</strong></span> {{ Auth::user()->email }}
        </div>
        <div><span class="label"><strong>Phone:</strong></span> {{ $personal->mobile_number }}</div>
        <div><span class="label"><strong>Date of Birth:</strong></span>
            {{ \Carbon\Carbon::parse($personal->date_of_birth)->format('M d, Y') }}</div>
        <div><span class="label"><strong>Gender:</strong></span> {{ ucfirst($personal->gender) }}</div>
        <div><span class="label"><strong>National ID:</strong></span> {{ $personal->national_id_number }}</div>
        <div><span class="label"><strong>County:</strong></span> {{ $personal->county->county_name }}</div>
        <div><span class="label"><strong>Subcounty:</strong></span> {{ $personal->subcounty->subcounty_name }}</div>
        <div><span class="label"><strong>Ethnicity:</strong></span> {{ $personal->ethnicity->ethnicity_name }}</div>
    </div> --}}
    <div>
        <h2 class="section-title">Education Background</h2>
        <table>
            <thead>
                <tr>
                    <th>Institution</th>
                    <th>Level</th>
                    <th>Field of Study</th>
                    <th>Award</th>
                    <th>Start</th>
                    <th>End</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($education as $edu)
                    <tr>
                        <td>{{ $edu->institution }}</td>
                        <td>{{ $edu->qualification }}</td>
                        <td>{{ $edu->course }}</td>
                        <td>{{ $edu->award }}</td>
                        <td>{{ \Carbon\Carbon::parse($edu->start_date)->format('M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($edu->end_date)->format('M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No education records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div>
        <h2 class="section-title">Work Experience</h2>
        <table>
            <thead>
                <tr>
                    <th>Organization</th>
                    <th>Position</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employments as $exp)
                    <tr>
                        <td>{{ $exp->organization }}</td>
                        <td>{{ $exp->designation }}</td>
                        <td>{{ \Carbon\Carbon::parse($exp->start_date)->format('M Y') }}</td>
                        <td>{{ $exp->end_date ? \Carbon\Carbon::parse($exp->end_date)->format('M Y') : 'Present' }}
                        </td>
                        <td>{{ $exp->duties }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No experience records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        <h2 class="section-title">Professional Qualifications</h2>
        <table>
            <thead>
                <tr>
                    <th>Certifying Body</th>
                    <th>Qualification Name</th>
                    <th>Certificate No</th>
                    <th>Award</th>
                    <th>Start Date</th>
                    <th>End Date</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($qualifications as $cert)
                    <tr>
                        <td>{{ $cert->certifying_body}}</td>
                        <td>{{ $cert->qualification_name }}</td>
                        <td>{{ $cert->certificate_number }}</td>
                        <td>{{ $cert->award }}</td>
                        <td>{{ \Carbon\Carbon::parse($exp->start_date)->format('M Y') }}</td>
                        <td>{{ $exp->end_date ? \Carbon\Carbon::parse($exp->end_date)->format('M Y') : 'Present' }}
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No qualifications found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div>
        <h2 class="section-title">Memberships</h2>
        <table>
            <thead>
                <tr>
                    <th>Membership Body</th>
                    <th>Membership Type</th>
                    <th>Membership Number</th>
                    <th>Date Renewed</th>
                    <th>Expiry Date</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($memberships as $member)
                    <tr>
                        <td>{{ $member->membership_body }}</td>
                        <td>{{ $member->membership_type }}</td>
                        <td>{{ $member->membership_no }}</td>
                        <td>{{ $member->date_renewed }}</td>
                        <td>{{ $member->expiry_date }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No membership records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div>
        <h2 class="section-title">Referees</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Job Title</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Phone</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($referees as $ref)
                    <tr>
                        <td>{{ $ref->full_name }}</td>
                        <td>{{ $ref->occupation }}</td>
                        <td>{{ $ref->city }}</td>
                        <td>{{ $ref->email }}</td>
                        <td>{{ $ref->phone_number }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No membership records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="footer">
        {{-- &copy; {{ date('Y') }} Bandari Maritime Academy | Page <span class="page-number"></span> --}}
    </div>
</body>

</html>
