/**
 * Created by Daniel M. Prince on 4/13/16.
 */
var MapFilter = function (map) {
    // filter map
    $('#dropdown-tr li').click(function (e) {
        e.preventDefault();
        var business_id = parseInt($(this).attr('data-id'));
        if ($.isNumeric(business_id)) {
            map.findMarker(function (marker) {
                if (business_id !== 0) {
                    if (marker['businessId'] !== business_id) {
                        this.hide(marker);
                    } else {
                        this.show(marker);
                    }
                } else {
                    this.show(marker);
                }
            });
        }
    });

    // search map markers
    $('#search-map').keyup(function (e) {
        e.preventDefault();
        var value = $(this).val();
        value     = value.toLowerCase();
        map.findMarker(function (marker) {
            if (value.length > 0) {
                if (marker['showing'] === true) {
                    var name = marker['name'].toLowerCase(),
                        desc = marker['desc'].toLowerCase(),
                        area = marker['area'].toLowerCase();
                    if (name.indexOf(value) === -1 && desc.indexOf(value) === -1 && area.indexOf(value) === -1) {
                        this.hide(marker, true);
                    } else {
                        this.show(marker);
                    }
                }
            }
        });
    });
};