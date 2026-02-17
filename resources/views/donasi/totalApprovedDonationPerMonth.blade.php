@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Total Approved Donation Per Month</h1>

        @if(count($totalPerMonth) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Year</th>
                        <th>Month</th>
                        <th>Total Nominal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($totalPerMonth as $total)
                        <tr>
                            <td>{{ $total->year }}</td>
                            <td>{{ $total->month }}</td>
                            <td>{{ $total->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No approved donations per month.</p>
        @endif
    </div>
@endsection
