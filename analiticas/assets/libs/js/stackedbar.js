/**
 * sources:
 * https://www.d3-graph-gallery.com/graph/barplot_stacked_percent.html 
 * https://bl.ocks.org/ColinEberhardt/493ed4a0c186e9cfe88afacbe2a16fe2
 * https://stackoverflow.com/questions/4091257/variable-as-index-in-an-associative-array-javascript
 */

var margin = {top: 10, right: 30, bottom: 20, left: 50},
    width = 460 - margin.left - margin.right,
    height = 425 - margin.top - margin.bottom;

var svg = d3.select("#my_dataviz")
  .append("svg")
    .attr("width", width + 500 + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
    .attr("transform",
          "translate(" + (margin.left + 225) + "," + margin.top + ")");


var udates = new Array();
var users = new Array(); 

var idcourse = document.getElementById("course").value;

var newLocal2 = "../services/logs2.php?course="+idcourse;
d3.json(newLocal2).then(function(data){
    var sample = new Array();
    data.forEach(function(d){
      if(!users.includes('user ' +d.userid)){
        users.push('user ' + d.userid)
      };
      if(!udates.includes(d.fecha)){
        var nentry = new Object();
        udates.push(d.fecha); 
        nentry.group = String(d.fecha);
        var uindex = 'user ' + d.userid;
        nentry[uindex] = parseInt(d.contribuc);
        sample.push(nentry);
      }
      else{
        var idx = sample.findIndex(x=> x.group ===d.fecha); 
        var uindex = 'user ' + d.userid;
        sample[idx][uindex] = parseInt(d.contribuc);
      }
    });

  var subgroups = users;

  var groups = udates;

  var x = d3.scaleBand()
      .domain(groups)
      .range([0, width])
      .padding([0.2])
  svg.append("g")
    .attr("transform", "translate(0," + height + ")")
    .call(d3.axisBottom(x).tickSizeOuter(0));

  var y = d3.scaleLinear()
    .domain([0, 100])
    .range([ height, 0 ]);
  svg.append("g")
    .call(d3.axisLeft(y));

  var color = d3.scaleOrdinal()
    .domain(subgroups)
    .range(["#2d132c", "#801336", "#ee4540","#004a2f", "#002f35", 
"#ffa323", "#735372", "#8adfdc","#a34a28","#553c8b"])
//
  
  var legend = d3.legendColor()
    .shapeWidth(70)
    .orient('horizontal')
    .scale(color);
  
  d3.select('#legend')
    .attr("transform","translate(155,0)")
    .call(legend);


  dataNormalized = []

  sample.forEach(function(d){
    tot = 0;
    for (i in subgroups){
      name=subgroups[i];
      if(d[name] === undefined){
        d[name] = 0;
      }
      tot += d[name]
    }

    for (i in subgroups){
      name=subgroups[i];
      if(d[name] === undefined){
        d[name] = 0;
      }
      d[name] = d[name] / tot * 100;
    }
  })

  var stackedData = d3.stack()
    .keys(subgroups)
    (sample)

  svg.append("g")
    .selectAll("g")

    .data(stackedData)
    .enter().append("g")
      .attr("fill", function(d) { return color(d.key); })
      .selectAll("rect")
      
      .data(function(d) { return d; })
      .enter().append("rect")
        .attr("x", function(d) { return x(d.data.group); })
        .attr("y", function(d) { return y(d[1]); })
        .attr("height", function(d) { return y(d[0]) - y(d[1]); })
        .attr("width",x.bandwidth())          
})
