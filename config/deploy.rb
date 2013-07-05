set :application, "dep"
set :user, "indianic"
set :password, "indianic"
set :domain,      "10.2.2.71"
set :project_root,   "/opt/lampp/htdocs/public_html/run"
set :deploy_to,   "/opt/lampp/htdocs/public_html/#{application}"
set :document_root, "/opt/lampp/htdocs/public_html/#{application}"

default_run_options[:pty] = true
ssh_options[:forward_agent] = true

set :repository,  "git@github.com:/sandipindianic/gittest.git"
set :scm,         :git
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `subversion`, `mercurial`, `perforce`, `subversion` or `none`

set :branch, "master"

role :web, "10.2.2.71"   # Your HTTP server, Apache/etc
role :app, "10.2.2.71"   # This may be the same as your `Web` server or a separate administration server

set  :keep_releases,  3

#set :copy_exclude, [".git/*", ".svn/*", ".DS_Store"]
# what should be left behind in the copy
set :copy_exclude, %w[.git .DS_Store .gitignore .gitmodules .sass-cache sass Capfile config config.rb]
 
#set :deploy_via, :export  
set :deploy_via,  :remote_cache  
#set :deploy_via, :copy  # not work in local, use it for live server

# Turn off use of sudo if your user does not need elevated permissions
set :use_sudo, false


#set :application, "set your application name here"
#set :repository,  "set your repository location here"

# set :scm, :git # You can set :scm explicitly or Capistrano will make an intelligent guess based on known version control directory names
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `git`, `mercurial`, `perforce`, `subversion` or `none`

#role :web, "your web-server here"                          # Your HTTP server, Apache/etc
#role :app, "your app-server here"                          # This may be the same as your `Web` server
#role :db,  "your primary db-server here", :primary => true # This is where Rails migrations will run
#role :db,  "your slave db-server here"

# if you want to clean up old releases on each deploy uncomment this:
# after "deploy:restart", "deploy:cleanup"

# if you're still using the script/reaper helper you will need
# these http://github.com/rails/irs_process_scripts

# If you are using Passenger mod_rails uncomment this:
# namespace :deploy do
#   task :start do ; end
#   task :stop do ; end
#   task :restart, :roles => :app, :except => { :no_release => true } do
#     run "#{try_sudo} touch #{File.join(current_path,'tmp','restart.txt')}"
#   end
# end