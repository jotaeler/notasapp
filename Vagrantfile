# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

    config.vm.box = "scotch/box"
    config.vm.network "private_network", ip: "192.168.33.10"
    #  config.vm.network "private_network", type: "dhcp"
    # config.vm.network "forwarded_port", guest: 80, host: 3000
    # config.vm.network "forwarded_port", guest: 8080, host: 3080
    config.vm.hostname = "scotchbox"
    config.vm.synced_folder ".", "/var/www/public", :mount_options => ["dmode=777", "fmode=666"]

    config.vm.provider "virtualbox" do |vb|
      vb.customize ['modifyvm', :id, '--cableconnected1', 'on']
      vb.memory = 1024
    end

    # Optional NFS. Make sure to remove other synced_folder line too
    #config.vm.synced_folder ".", "/var/www", :nfs => { :mount_options => ["dmode=777","fmode=666"] }

    # Script que se ejecuta la primera vez que se ejecuta
    config.vm.provision "shell", path: "install.sh"

  end
