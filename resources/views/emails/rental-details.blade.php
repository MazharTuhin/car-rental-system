<h1>Rental Details</h1>

<p>Dear {{ $customer->name }},</p>

<p>Thank you for renting our car. Here are the details of your rental:</p>

<ul>
    <li>Car: {{ $car->name }}</li>
    <li>Rental Period: {{ $rental->start_date->format('Y-m-d') }} - {{ $rental->end_date->format('Y-m-d') }}</li>
    <li>Total Cost: {{ $rental->total_cost }}</li>
</ul>

<p>Thank you for choosing our car rental service.</p>

<p>Best regards,</p>
<p>Your Car Rental Team</p>