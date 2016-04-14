var templateRoot = "./templates/";
module.exports   = {
    pages    : {
        site      : [
            templateRoot + "/pages/site/**/*.*"
        ],
        blog      : [
            templateRoot + "/pages/blog/**/*.*"
        ],
        business  : [
            templateRoot + "/pages/business/**/*.*"
        ],
        subfolders: [
            './auth/blog/**/*.*',
            './auth/business/**/*.*'
        ]
    },
    templates: [
        templateRoot + "/main/",
        templateRoot + "/partials/",
        templateRoot + "/partial_files/"
    ]
};