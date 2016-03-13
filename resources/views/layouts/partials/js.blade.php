
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="{{ asset('plugins/jquery.seatcharts/jquery.seat-charts.js') }}"></script>

<script>
    var price = 10; //price
    $(document).ready(function() {
        var $cart = $('#selected-seats'), //Sitting Area
                $counter = $('#counter'), //Votes
                $total = $('#total'); //Total money

        var sc = $('#seat-map').seatCharts({
            map: [  //Seating chart
                'aaaaaaaaaa',
                'aaaaaaaaaa',
                '__________',
                'aaaaaaaa__',
                'aaaaaaaaaa',
                'aaaaaaaaaa',
                'aaaaaaaaaa',
                'aaaaaaaaaa',
                'aaaaaaaaaa',
                'aa__aa__aa'
            ],
            naming : {
                top : false,
                getLabel : function (character, row, column) {
                    return column;
                }
            },
            legend : { //Definition legend
                node : $('#legend'),
                items : [
                    [ 'a', 'available',   'Option' ],
                    [ 'a', 'unavailable', 'Sold']
                ]
            },
            click: function () { //Click event
                if (this.status() == 'available') { //optional seat
                    $('<input><p>R'+(this.settings.row+1)+' S'+this.settings.label+'</p></input>')
                            .attr('id', 'seat_id')
                            .attr('name', 'seat_id[]')
                            .attr('type', 'hidden')
                            .attr('style', 'padding-right:4px;')
                            .attr('value', this.settings.id)
                            .data('seatId', this.settings.id)
                            .appendTo($cart);

                    $counter.text(sc.find('selected').length+1);
                    $total.text(recalculateTotal(sc)+price);

                    return 'selected';
                } else if (this.status() == 'selected') { //Checked
                    //Update Number
                    $counter.text(sc.find('selected').length-1);
                    //update totalnum
                    $total.text(recalculateTotal(sc)-price);

                    //Delete reservation
                    $('#cart-item-'+this.settings.id).remove();
                    //optional
                    return 'available';
                } else if (this.status() == 'unavailable') { //sold
                    return 'unavailable';
                } else {
                    return this.style();
                }

            }

        });

            //let's pretend some seats have already been booked
                sc.get(['1_2', '4_1', '7_1', '7_2']).status('unavailable');

    });
    //sum total money
    function recalculateTotal(sc) {
        var total = 0;
        sc.find('selected').each(function () {
            total += price;
        });

        return total;
    }

    id = $('#film_id').val();

        setInterval(function() {
            $.ajax({
                type: 'GET',
                url: 'bookings/get/' + id,
                dataType: 'json',
                success: function (response) {
                    //iterate through all bookings for our event

                    $.each(response.seats, function (index, seats) {
                        //find seat by id and set its status to unavailable
                        console.log(response.seats);
                        sc.status(seats.seat_id, 'unavailable');
                    });
                }
            });
        }, 4000);


</script>
