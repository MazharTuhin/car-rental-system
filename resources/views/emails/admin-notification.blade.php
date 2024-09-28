<h1>Car Rental Notification</h1>

<p>Dear Admin,</p>

<p>A car has been rented by <strong>{{ $customer->name }}</strong>. Here are the details of the rental:</p>

<ul>
    <li>Car: {{ $car->name }}</li>
    <li>Rental Period: {{ $rental->start_date->format('Y-m-d') }} - {{ $rental->end_date->format('Y-m-d') }}</li>
    <li>Total Cost: {{ $rental->total_cost }}</li>
</ul>

<p>Please review the rental details and take necessary actions.</p>

<p>Best regards,</p>
<p>Your Car Rental Team</p>