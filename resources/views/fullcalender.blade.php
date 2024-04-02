<!DOCTYPE html>
<html>
<head>
    <title>Full calendar</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
</head>
<body>
<div class="container">
    <h1>Teste Full Calendar</h1>
    {{ $batata['inicio']}}
    {{ $batata['final']}}
    <div id='calendar'></div>
</div>

    <script type="text/javascript">
    $(document).ready(function () {
     /*------------Get Site URL----*/
        var SITEURL = "{{ url('/') }}";
        /*-------------- CSRF Token------*/
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        /*------FullCalender JS Code------*/
        var calendar = $('#calendar').fullCalendar({
                        header: {
                            left: 'prev,next',
                            center: 'title',
                            right: 'agendaWeek, agendaDay'
                        },
                        eventColor: '#db2777',
                        editable: true,
                        events: SITEURL + "/fullcalender",
                        displayEventTime: true,
                        editable: true,
                        locale: 'pt-br', 
                        timezone: 'America/Sao_Paulo',
                        defaultView: 'agendaWeek',
                        timeFormat: 'H:mm',
                        slotDuration: "01:00:00",
                        allDaySlot: false, 
                        slotLabelFormat: 'H:mm', 
                        defaultTimedEventDuration : { 
                            hours: 1, 
                        },
                        timeFormat: 'HH:mm', 
                        // allDay: false, 
                        allDayDefault: false,
                        eventRender: function (event, element, view) {
                            // if (event.allDay === 'true') {
                            //         event.allDay = true;
                            // } else {
                            //         event.allDay = false;
                            // }
                            event.allDay = false;
                        },
                        businessHours: {
                            // days of week. an array of zero-based day of week integers (0=Sunday)
                            dow: [ 1, 2, 3, 4, 5 ], // Monday - Friday

                            start: "{{$batata['inicio']}}", // a start time (10am in this example)
                            end: "{{$batata['final']}}", // an end time (6pm in this example)
                        },
                       
                        selectable: true,
                        selectHelper: true,
                        select: function (start, end, allDay) { //função executada quando as datas são selecionadas
                            var title = prompt('Event Title:');
                            if (title) {
                                var start = $.fullCalendar.formatDate(start, "Y-MM-DD H:mm");
                                var end = $.fullCalendar.formatDate(end, "Y-MM-DD H:mm");
                                $.ajax({
                                    url: SITEURL + "/fullcalenderAjax",
                                    data: {
                                        title: title,
                                        start: start,
                                        end: end,
                                        type: 'add'
                                    },
                                    type: "POST",
                                    success: function (data) {
                                        //data: dados do evento
                                        displayMessage("Evento criado com sucesso");
                                        calendar.fullCalendar('renderEvent',
                                            {
                                                id: data.id,
                                                title: title,
                                                start: start,
                                                end: end,
                                                allDay: allDay
                                            },true);
                                        calendar.fullCalendar('unselect');
                                    }
                                });
                            }
                        },
                        /*-------------------arrasta e solta --------------------------*/ 
                        eventDrop: function (event, delta) {
                            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                            $.ajax({
                                url: SITEURL + '/fullcalenderAjax',
                                data: {
                                    title: event.title,
                                    start: start,
                                    end: end,
                                    id: event.id,
                                    type: 'update'
                                },
                                type: "POST",
                                success: function (response) {
                                    displayMessage("Evento atualizado com sucesso");
                                }
                            });
                        },

                        eventClick: function (event) { //evento quando é clicado é excluído
                            var deleteMsg = confirm("Você realmente gostaria de excluir?");
                            if (deleteMsg) {
                                $.ajax({
                                    type: "POST",
                                    url: SITEURL + '/fullcalenderAjax',
                                    data: {
                                            id: event.id,
                                            type: 'delete'
                                    },

                                    success: function (response) {
                                        calendar.fullCalendar('removeEvents', event.id);
                                        displayMessage("Evento excluído com sucesso");
                                    }
                                });
                            }
                        }
                    });
        });
        /*---------Toastr Success ------------*/
        function displayMessage(message) {
            toastr.success(message, 'Novo evento');
        } 
    </script>
</body>
</html>