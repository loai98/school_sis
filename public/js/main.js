
// var route = "{{ url('autocomplete') }}";
// $('#search').typeahead({
//     source: function (query, process) {
//         return $.get(route, {
//             query: query
//         }, function (data) {
//             console.log(route);

//             return process(data);
//         });
//     }
// });

// var my_dataset = ['al','dfd'];

// $('.typeahead').typeahead({
//     minLength: 3,
//     highlight: true
//   },
//   {
//     name: 'my_dataset'
//   });


//   var cars = ['Audi', 'BMW', 'Bugatti', 'Ferrari', 'Ford', 'Lamborghini', 'Mercedes Benz', 'Porsche', 'Rolls-Royce', 'Volkswagen'];
    
//   // Constructing the suggestion engine
//   var cars = new Bloodhound({
//       datumTokenizer: Bloodhound.tokenizers.whitespace,
//       queryTokenizer: Bloodhound.tokenizers.whitespace,
//       local: cars
//   });
  
//   // Initializing the typeahead
//   $('.typeahead').typeahead({
//       hint: true,
//       highlight: true, /* Enable substring highlighting */
//       minLength: 1 /* Specify minimum characters required for showing suggestions */
//   },
//   {
//       name: 'cars',
//       source: cars
//   });