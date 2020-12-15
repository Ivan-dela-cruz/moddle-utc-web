@extends('admin.init.index')
@section('title')
    Administración
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Panel de control" position="Inicio"></x-content>


            <div class="row">
                <!-- customar project  start -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center m-l-0">
                                <div class="col-auto">
                                    <img height="46" src="{{asset('img/user.png')}}" alt="">
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-muted m-b-10">Usuarios</h6>
                                    <h2 class="m-b-0">{{$users_count}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center m-l-0">
                                <div class="col-auto">
                                    <img height="46" src="{{asset('img/paciente.png')}}" alt="">
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-muted m-b-10">Pacientes</h6>
                                    <h2 class="m-b-0">{{$patients_count}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center m-l-0">
                                <div class="col-auto">
                                    <img height="46" src="{{asset('img/dentist.png')}}" alt="">
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-muted m-b-10">Doctores</h6>
                                    <h2 class="m-b-0">{{$doctors_count}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center m-l-0">
                                <div class="col-auto">
                                    <img height="36" src="{{asset('img/calendar.svg')}}" alt="">

                                </div>
                                <div class="col-auto">
                                    <h6 class="text-muted m-b-10">Citas</h6>
                                    <h2 class="m-b-0">{{$appointments_count}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center m-l-0">
                                <div class="col-auto">
                                    <img height="46" src="{{asset('img/ficham.png')}}" alt="">
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-muted m-b-10">Especialidades</h6>
                                    <h2 class="m-b-0">{{$specialties_count}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center m-l-0">
                                <div class="col-auto">
                                    <img height="46" src="{{asset('img/ficha.png')}}" alt="">

                                </div>
                                <div class="col-auto">
                                    <h6 class="text-muted m-b-10">Tratamientos</h6>
                                    <h2 class="m-b-0">{{$treatments_count}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center m-l-0">
                                <div class="col-auto">
                                    <i class="fas fa-file-invoice-dollar f-36 text-c-red"></i>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-muted m-b-10">Pagos</h6>
                                    <h2 class="m-b-0">{{$payments_count_month}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center m-l-0">
                                <div class="col-auto">
                                    <i class="fas fa-pills f-36 text-c-purple"></i>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-muted m-b-10">Recetas</h6>
                                    <h2 class="m-b-0">{{$recipes_count}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- customar project  end -->

                    {{-----
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Estadística de especialidades</h5>
                        </div>
                        <div class="card-body">
                            <div id="summary-chart"></div>
                        </div>
                    </div>
                </div>

                --}}
                <div class="col-lg-5 col-md-12">
                    <!-- page statustic card start -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-yellow">$ {{$payments_sum_month}}</h4>
                                            <h6 class="text-muted m-b-0">Ingresos </h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="feather icon-bar-chart-2 f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-yellow">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0">{{\Carbon\Carbon::now()->monthName}}</p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="feather icon-trending-up text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-green">{{$patients_count_month}}+</h4>
                                            <h6 class="text-muted m-b-0">Pacientes</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="feather icon-file-text f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-green">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0">Ingresados</p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="feather icon-trending-up text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-red">-{{$appointments_count_an}}</h4>
                                            <h6 class="text-muted m-b-0">Citas </h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="feather icon-calendar f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-red">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0">Anuladas</p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="feather icon-trending-down text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-blue">{{$treatments_count_month}}+</h4>
                                            <h6 class="text-muted m-b-0">Nuevos </h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="feather icon-thumbs-down f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-blue">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0">Tratamientos</p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="feather icon-trending-down text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- page statustic card end -->
                </div>
                <!-- Tasks start -->
                <div class="col-xl-7 col-md-12">
                    <div class="card task-card">
                        <div class="card-header">
                            <h5>Actividades para hoy </h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled task-list">
                                @foreach($appointments_count_day as $app_day)
                                    <li>
                                        <i class="task-icon  fa fa-circle fa-1x"
                                           style="  color: {{$app_day->color}};"></i>
                                        <p class="m-b-5">{{\Carbon\Carbon::parse($app_day->date)->toFormattedDateString()}}
                                            ({{$app_day->specialty}})</p>
                                        <h6 class="text-muted">
                                            Especialista {{$app_day->name_d}} {{$app_day->last_name_d}} encargado de
                                            atender a {{$app_day->name_p}} {{$app_day->last_name_p}} para
                                            {{$app_day->reason}}.
                                        </h6>
                                        <span
                                            class="text-c-blue">Esta cita se confirmo {{\Carbon\Carbon::parse($app_day->updated_at)->diffForHumans()}} </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- prject ,team member start -->
                <div class="col-xl-12 col-md-12">
                    <div id="section_table_app">
                        @include('admin.init.tableAppointments')
                    </div>
                </div>


            </div>
            <!-- [ Main Content ] end -->

            <div class="modal fade" id="modal-report" tabindex="-1" role="dialog"
                 aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header badge-primary">
                            <h5 class="modal-title text-white">Elija una opción</h5>
                            <button type="button" class="close text-white"
                                    data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input hidden type="text" id="id_app_form"/>
                                            <select class="form-control" name="status" id="status">
                                                <option value="Atendido"> Atendido</option>
                                                <option value="Anulado"> Anulado</option>
                                                <option value="Confirmado"> Confirmado</option>
                                                <option value="No asiste"> No asiste</option>
                                                <option value="Pendiente"> Pendiente</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button id="btn_app_confirm" class="btn btn-success" data-dismiss="modal"
                                                type="button">Aplicar
                                        </button>
                                        <button id="btn_app_cancel" data-dismiss="modal"
                                                class="btn btn-danger" type="button">Cancelar
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="text-center">
                                    <h3 class="mt-3">Welcome To <span
                                            class="text-primary">Able pro</span><sup>v8.0</sup></h3>
                                </div>
                                <div class="carousel-inner text-center">
                                    <div class="carousel-item active" data-interval="50000">
                                        <img src="assets/images/model/welcome.svg" class="wid-250 my-4" alt="images">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-9">
                                                <p class="f-16"><strong>Able pro v8.0</strong> will come with new
                                                    Structure.</p>
                                                <p class="f-16"> it include <strong>Gulp / npm support, UI kit, Live
                                                        customizer improved version, New improved layouts with RTL
                                                        support, 8+ New Admin Panels</strong></p>
                                                <div class="row justify-content-center text-left">
                                                    <div class="col-md-10">
                                                        <h4 class="mb-3">Feature</h4>
                                                        <p class="mb-2 f-16"><i
                                                                class="feather icon-check-circle mr-2 text-primary"></i>
                                                            Gulp / npm support</p>
                                                        <p class="mb-2 f-16"><i
                                                                class="feather icon-check-circle mr-2 text-primary"></i>
                                                            UI kit</p>
                                                        <p class="mb-2 f-16"><i
                                                                class="feather icon-check-circle mr-2 text-primary"></i>
                                                            Live customizer improved version</p>
                                                        <p class="mb-2 f-16"><i
                                                                class="feather icon-check-circle mr-2 text-primary"></i>
                                                            New improved layouts with RTL support</p>
                                                        <p class="mb-2 f-16"><i
                                                                class="feather icon-check-circle mr-2 text-primary"></i>
                                                            8+ New Admin Panels</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item" data-interval="50000">
                                        <img src="assets/images/model/able-admin.jpg" class="img-fluid mt-0"
                                             alt="images">
                                    </div>
                                    <!-- <div class="carousel-item" data-interval="50000">
                                        <img src="assets/images/model/welcome.svg" class="wid-250 my-4" alt="images">
                                        <div class="row justify-content-center">
                                            <div class="col-md-8">
                                                <p class="f-16"><strong>Able pro v8.0</strong> will come with new Structure.</p>
                                                <p class="f-16"> it include  <strong>Gulp / npm support, UI kit, Live customizer improved version, New improved layouts with RTL support, 8+ New Admin Panels</strong></p>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>

                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"
                                 style="transform:rotate(180deg);margin-bottom:-1px">
                                <path class="elementor-shape-fill" fill="#4680ff" opacity="0.33"
                                      d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z">
                                </path>
                                <path class="elementor-shape-fill" fill="#4680ff" opacity="0.66"
                                      d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"></path>
                                <path class="elementor-shape-fill" fill="#4680ff"
                                      d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"></path>
                            </svg>
                            <div class="modal-body text-center bg-primary py-4">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <!-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
                                </ol>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                   data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="ml-2">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                   data-slide="next">
                                    <span class="mr-2">Next</span>
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')


    <script>
        // [ operation-processed ] start
        var point_app = [];
        var label_app = [];
        var colors_app = [];
        /*
        $(document).ready(function () {
         {{--  var citas = {!! json_encode($appointments_chart) !!};----}}
        for(var i = 0;i<citas.length;i++){
            console.log(citas[i].name);
            point_app.push(citas[i].citas);
            label_app.push(citas[i].name);
            colors_app.push(citas[i].color);
        }

    })
    */
        function getAppointments() {
            let url = "{{route('get-appointments-panel')}}";

            axios.get(url).then(function (response) {
                $('#section_table_app').empty();
                $('#section_table_app').html(response.data);
            }).catch(function (error) {
                Swal.fire(
                    'Opps!',
                    'Ocurrio un error.',
                    'error'
                );
                console.log(error);
            });
        }

        let id_app_confirm = 0;
        $(document).on("click", "#btn_app_edit", function (e) {
            id_app_confirm = $(this).data('id');
            $('#id_app_form').val(id_app_confirm);

        })
        $(document).on("click", "#btn_app_cancel", function (e) {
            alert('cancel');
        })
        $(document).on("click", "#btn_app_confirm", function (e) {
            event.preventDefault();
            let id = id_app_confirm;
            let status = $('#status').val();
            let url = "{{route('confirm-appointment')}}";

            Swal.fire({
                title: '¿Está seguro para de aplicar los cambios? ',
                text: "Tu podrás revertir está acción",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                    axios.patch(url, {
                        'id': id,
                        'status': status
                    }).then(function (response) {
                        getAppointments();
                        Swal.fire(
                            'Aplicado!',
                            'El tarea se ha cumplido exitosamente.',
                            'success'
                        );
                    }).catch(function (error) {
                        Swal.fire(
                            'Opps!',
                            'Ocurrio un error.',
                            'error'
                        );
                        console.log(error);
                    });


                }
            });

        })

        $(function () {
            var options = {
                chart: {
                    height: 250,
                    type: 'area',
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 2,
                    curve: 'smooth'
                },
                colors: ["#ff5252", "#4680ff", "#6cf854"],
                fill: {
                    type: 'solid',
                    opacity: 0.2,
                },
                markers: {
                    size: 3,
                    opacity: 0.9,
                    colors: "#fff",
                    strokeColor: ["#ff5252", "#4680ff", "#6cf854"],
                    strokeWidth: 2,
                    hover: {
                        size: 7,
                    }
                },
                series: [{
                    name: 'Endodoncia',
                    data: [40, 75, 20, 45, 30, 50, 30]
                }, {
                    name: 'Ortodoncia',
                    data: [90, 40, 60, 20, 10, 0, 0]
                }, {
                    name: 'Cirujia',
                    data: [120, 10, 60, 20, 10, 47, 0]
                }],

                xaxis: {
                    type: 'datetime',
                    categories: ["2020-01-19", "2020-02-19", "2020-03-19", "2020-04-19", "2020-05-19", "2020-06-19", "2020-07-19"],
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy HH:mm'
                    },
                }
            }
            var chart = new ApexCharts(
                document.querySelector("#summary-chart"),
                options
            );
            chart.render();
        });
        // [ operation-processed ] end
        // [ proj-earning ] start
        $(function () {
            var options = {
                chart: {
                    type: 'bar',
                    height: 310,
                    zoom: {
                        enabled: false
                    },
                    toolbar: {
                        show: false,
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                colors: ["#fff"],
                plotOptions: {
                    bar: {
                        color: '#fff',
                        columnWidth: '60%',
                    }
                },
                fill: {
                    type: 'solid',
                    opacity: 1,
                },
                series: [{
                    data: [25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54, 25, 66, 41, 89, 63, 54, 25, 66, 41, 89, 63, 25, 44, 12, 36]
                }],
                xaxis: {
                    crosshairs: {
                        width: 1
                    },
                    labels: {
                        show: false,
                    },
                },
                yaxis: {
                    labels: {
                        style: {
                            color: '#fff',
                        }
                    },
                },
                grid: {
                    borderColor: '#ffffff85',
                    padding: {
                        bottom: 0,
                        left: 10,
                    }
                },
                tooltip: {
                    fixed: {
                        enabled: false
                    },
                    x: {
                        show: false
                    },
                    y: {
                        title: {
                            formatter: function (seriesName) {
                                return 'Total absent'
                            }
                        }
                    },
                    marker: {
                        show: false
                    }
                }
            };
            var chart = new ApexCharts(document.querySelector("#absent-chart"), options);
            chart.render();
        });
        // [ proj-earning ] end
        // Full calendar
        $(function () {
            $('#Eventcalendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: '2018-08-12',
                editable: true,
                droppable: true,
                events: [{
                    title: 'All Day Event',
                    start: '2018-08-01',
                    borderColor: '#04a9f5',
                    backgroundColor: '#04a9f5',
                    textColor: '#fff'
                }, {
                    title: 'Long Event',
                    start: '2018-08-07',
                    end: '2018-08-10',
                    borderColor: '#f44236',
                    backgroundColor: '#f44236',
                    textColor: '#fff'
                }, {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2018-08-09T16:00:00',
                    borderColor: '#f4c22b',
                    backgroundColor: '#f4c22b',
                    textColor: '#fff'
                }, {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2018-08-16T16:00:00',
                    borderColor: '#3ebfea',
                    backgroundColor: '#3ebfea',
                    textColor: '#fff'
                }, {
                    title: 'Conference',
                    start: '2018-08-11',
                    end: '2018-08-13',
                    borderColor: '#1de9b6',
                    backgroundColor: '#1de9b6',
                    textColor: '#fff'
                }, {
                    title: 'Meeting',
                    start: '2018-08-12T10:30:00',
                    end: '2018-08-12T12:30:00'
                }, {
                    title: 'Lunch',
                    start: '2018-08-12T12:00:00',
                    borderColor: '#f44236',
                    backgroundColor: '#f44236',
                    textColor: '#fff'
                }, {
                    title: 'Happy Hour',
                    start: '2018-08-12T17:30:00',
                    borderColor: '#a389d4',
                    backgroundColor: '#a389d4',
                    textColor: '#fff'
                }, {
                    title: 'Birthday Party',
                    start: '2018-08-13T07:00:00'
                }, {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: '2018-08-28',
                    borderColor: '#a389d4',
                    backgroundColor: '#a389d4',
                    textColor: '#fff'
                }],
                drop: function () {
                    if ($('#drop-remove').is(':checked')) {
                        $(this).remove();
                    }
                }
            });
        });
        var base64;
        function convertToBase64() {
            //Read File
            var selectedFile = document.getElementById("inputFile").files;
            //Check File is not Empty
            if (selectedFile.length > 0) {
                // Select the very first file from list
                var fileToLoad = selectedFile[0];
                // FileReader function for read the file.
                var fileReader = new FileReader();

                // Onload of file read the file content
                fileReader.onload = function (fileLoadedEvent) {
                    base64 = fileLoadedEvent.target.result;
                    // Print data in console
                    console.log(base64);
                };
                // Convert data to base64
                fileReader.readAsDataURL(fileToLoad);
            }
        }

        $('#inputFile').on('change',function () {
            convertToBase64();
        })
        $("#enviar").on('click',function () {
            alert(base64);
            let url = "{{route('api-store-file')}}";
            axios.post(url, {
                id: 0,
                id_patient: 1,
                name: 'oscar',
                description: 'nada',
                type: 'pdf',
                url_file: base64
            }).then(function (response) {

                Swal.fire(
                    'Aplicado!',
                    'El tarea se ha cumplido exitosamente.',
                    'success'
                );
            }).catch(function (error) {
                Swal.fire(
                    'Opps!',
                    'Ocurrio un error.',
                    'error'
                );
                console.log(error);
            });
        });
    </script>



@endsection
