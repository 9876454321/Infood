from django.shortcuts import render

# BRR77PXMshfvqBYWqjcWXQ==aIytZQuTBuK8gieP
# Create your views here.
def home(request):

    import json
    import requests

    if request.method == 'POST':
        query = request.POST['query']
        api_url = 'https://api.api-ninjas.com/v1/nutrition?query='
        api_request = requests.get (api_url + query, headers={'X-Api-Key': 'BRR77PXMshfvqBYWqjcWXQ==aIytZQuTBuK8gieP'})
        try: 
            api = json.loads(api_request.content)
            print(api_request.content)
        except Exception as e:
            api = "¡Ups! Hubo un error"
            print(e)
        return render(request, 'home.html', {'api':api})
    else:
        return render(request, 'home.html', {'query':'Enter a valid query'})
    