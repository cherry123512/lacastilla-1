@component('mail::message')
   Hi {{ $name }},<br />
   We are happy to tell you that your Reservation Request has been approved.
   <br /><br />

          Date: {{ $reservation_date }}
          From: {{ $reservation_time_from }}
          To: {{ $reservation_time_to }}
    
   Please pay your reservation at LDCU Main Campus Cashier Before the said date.

   Regards,<br />
   Lacastilla Management
@endcomponent