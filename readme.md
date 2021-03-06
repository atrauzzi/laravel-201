# Laravel 201

Welcome to the git repository for the "Laravel 201" presentation created by [Alexander Trauzzi](http://profiles.google.com/atrauzzi)!

This project was created to allow audience members to participate by turning their computers into worker nodes.

Feel free to use my profile link above should you have any questions or wish to get in touch with me!


## Synopsis

This project attempts to demonstrate a variety of concepts when working in medium to large sized Laravel 4 projects.  Much of it centers around the
separation of concerns and structuring of code to ensure a minimum of repetition and a maximum of reusability.

#### Concepts
 - DRY
 - Dependency Injection
 - Thin models
 - Separation of Concerns
 - Authoring and using reusable business logic
 - Queues & Workers
 - Avoiding NIH via packages


This project was designed to be run via Vagrant using the Ansible provisioner which creates a virtual machine pointing at the project directory.

## Getting Started

 - Install [Vagrant](http://vagrantup.com)

 - Install [Anisble](http://www.ansible.com/home)

 - Run `vagrant up [type]`
    - Where *"type"* is the type of node you wish to generate - more on this in a moment
    - This step will take a while!


## Nodes

The Vagrant and Ansible configurations for this project imply a cluster of worker nodes - `worker` - which connect to a single front end and database server - `front`.
Special care must be taken to ensure that multiple servers are not started on the same network otherwise workers are likely to have issues.

You should however be able to run as many workers as you wish.

All nodes run Ubuntu, with avahi and samba installed to ensure they are visible on the network via UPnP and Zeroconf.


### Front

Generated by running `vagrant up front`

Running a standard LAMP stack with Redis all listening on standard ports on the public network.

    Hostname:  laravel201front or laravel201front.local


### Worker

Generated by running `vagrant up worker`

    Hostname: laravel201worker#{rand(10000..99999)}


## As Seen In...

[Laravel 201 - Masters of the Laraverse](http://www.meetup.com/Winnipeg-PHP/events/183045462/)


## License

The code found in this project is free for anyone to adapt and is provided without warranty.  As ridiculous as this sounds, I assume no responsibility for any damages caused as a result of using this project.

I do however take full credit for the knowledge you will gain from studying it!