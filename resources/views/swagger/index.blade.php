<!-- HTML for static distribution bundle build -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Swagger UI</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('swaggerAsset/css/swagger-ui.css') }}" />
    <link rel="icon" type="image/png" href="{{ asset('swaggerAsset/img/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('swaggerAsset/img/favicon-16x16.png') }}" sizes="16x16" />
    <style>
      html
      {
        box-sizing: border-box;
        overflow: -moz-scrollbars-vertical;
        overflow-y: scroll;
      }

      *,
      *:before,
      *:after
      {
        box-sizing: inherit;
      }

      body
      {
        margin:0;
        background: #fafafa;
      }
    </style>
  </head>

  <body>
    <div id="swagger-ui"></div>

    <script src="{{ asset('swaggerAsset/js/swagger-ui-bundle.js') }}" charset="UTF-8"> </script>
    <script src="{{ asset('swaggerAsset/js/swagger-ui-standalone-preset.js') }}" charset="UTF-8"> </script>
    <script>
        window.onload = function() {
            // Custom plugin to hide the API definition URL
            const HideInfoUrlPartsPlugin = () => {
                return {
                    wrapComponents: {
                        InfoUrl: () => () => null
                    }
                }
            }

            // Begin Swagger UI call region
            const ui = SwaggerUIBundle({
            url: "{{ asset('swaggerAsset/api-docs/api-docs.yaml') }}",
                supportedSubmitMethods: [],
                dom_id: '#swagger-ui',
            deepLinking: false,
            presets: [
                SwaggerUIBundle.presets.apis,
                // SwaggerUIStandalonePreset
            ],
            plugins: [
                // SwaggerUIBundle.plugins.DownloadUrl,
                HideInfoUrlPartsPlugin
            ],
            layout: "BaseLayout"
        });
        // End Swagger UI call region
        window.ui = ui;

            var nodes = document.querySelectorAll("input[type=text]");
            nodes.parentNode.removeChild(nodes[i]);
    };

  </script>
  </body>
</html>
