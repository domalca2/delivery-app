function GetMap() {
    data = $("#miMapa").data();
    map = new Microsoft.Maps.Map(document.getElementById('miMapa'));
//Load the directions module.
    Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
        directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);
        data.wp.split("|").map(x => x.split(",")).forEach(wp => {
            directionsManager.addWaypoint(new Microsoft.Maps.Directions.Waypoint({location: new Microsoft.Maps.Location(parseFloat(wp[0]),parseFloat(wp[1]))}))
        });
        directionsManager.setRequestOptions({
            distanceUnit: Microsoft.Maps.Directions.DistanceUnit.km,
            routeAvoidance: [Microsoft.Maps.Directions.RouteAvoidance.avoidLimitedAccessHighway]
        });
        directionsManager.setRenderOptions({
            drivingPolylineOptions: {
                strokeColor: 'green',
                strokeThickness: 6
            },
            waypointPushpinOptions: {
                title: ''
            }
        });
//Calculate directions.
        directionsManager.calculateDirections();
    });

}

