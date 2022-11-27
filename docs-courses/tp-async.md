



https://www-sop.inria.fr/members/Philippe.Poulard/tp-promises.html



teams.json

    [
        {
            "name": "Java developer team",
            "from": "2000-01-01",
            "to": "2016-01-01",
            "people": [1, 2, 4]
        },
        {
            "name": "Javascript developer team",
            "from": "2016-01-02",
            "to": null,
            "people": [1, 2, 3]
        },
        {
            "name": "JSON masters",
            "from": "2010-01-01",
            "to": null,
            "people": [3, 4]
        }
    ]

people1.json

    {
        "id": 1,
        "name": "Alice",
        "email": "alice@example.com"
    }

people2.json

    {
        "id": 2,
        "name": "Bob",
        "email": "bob@example.com"
    }

people3.json

    {
        "id": 3,
        "name": "Courtney",
        "email": "courtney@example.com"
    }

people4.json

    {
        "id": 4,
        "name": "Daniel",
        "email": "daniel@example.com"
    }


Solution


    function jsonRead(name, encoding) {
        app.get("/teamsWithPeople",function(req,res) {
            jsonRead('data/teams.json')
                .then(teams => {
                    let promises = [];
                    console.log(teams.length);
                    for (let team of teams) {
                        for (let userId of team.people) {
                            promises.push(new Promise((resolve, reject) => {
                                let currentTeam = team;
                                jsonRead(`data/people/${userId}.json`)
                                    .then(user => {
                                        currentTeam.people.push(user);
                                        resolve();
                                    });
                                team.people = [];
                            }));
                        }
                    }
                    Promise.all(promises)
                        .then(() => {
                            res.writeHead(200, {'Content-Type': 'application/json'});
                            res.end(JSON.stringify(teams));
                        }).catch((err) => {
                            res.writeHead(500, {'Content-Type': 'text/plain'});
                            res.end('Error\n' + err);
                        });
                });    
        });
    }


//attention pas forcement le bon ordre.