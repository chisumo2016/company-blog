# GIT AND GITHUB
        https://www.youtube.com/watch?v=zTjRZNkhiEU
        git is a software and github ia service .Complete diffrent

    Version control system - Track files for changes
    Learning path
        -> Get the basics
        -> use it daily
        -> face the problem ->solve the problem
        -> I have covered more than basics in this .

# REPO  - REPOSITORY
    ->Git on system  vs tracking (repo)
        git --version
    -> Git history (demo)

        track gitone , gittwo no three
        cd gitone
        ls -la

  # GIT STATUS
        git status 
        git  init (one time per project)
           create  .git -> a hidden folder to keep history of all files and sub-folders

    mkdir gitOne
        cd gitOne
        git init 
        git status
            Folder is beeb tracked by the git

        ls
        gitone(tracked)   ( gitthree gittwo ) they are not tracked by git


# COMMITS 
        Is like a check points  (like game)
            WRITE -> ADD ->COMMITS

# FLOW 
    Working Dir (initialize) -> git add  ->taging Area (ready to commit some of file) ->git commit ->repo -->git push ---->github
        
    1: working dir . eg touch testone.txt testtwo.txt
    2: git add .   eg git add testone.txt
    3: staging area . : Intermidaite zone before you make any commit 
    4: git commit
    5: repo
    6: git push
    7: github

# GIT COMMITS AND LOGS
        git init
        git add 
        git commit -m  "add file one"
        git git push

# STAGE
    ->Git init
        create file or files
        git add file1 file2 || git add .
        git status
    ->Repeat 2-3 times
        git log (log of commits with commit hash )

# ATOMIC COMMITS
    -> Keep commits centric to one feature , one component or on fix . Focused on one thing.
    ->Present or Past commit message
        .Depends { present tense , Imperative }
        .Give order to code base
        .Don't care


   


# COMMIT
    git commit -m "a good descriptive message "
    git status

# GIT LOG
    git log
    git log --oneline

# GIT INTERNAL WORKING & CONFIGS FILE
        Author: Bernard Chisumo <bchisumo74@gmail.com>  HOW ?

         git config --global core.edito "code --wait"
        https://docs.github.com/en/get-started/git-basics/setting-your-username-in-git?versionId=free-pro-team%40latest&productId=get-started

            git config --global user.name "Mona Lisa"
            git config --global user.email "Mona Lisa"


        Command to configure my editor 
            git config --global core.edito "code --wait"

# GIT(SOFTWARE) / GIT HUB (SERVICE)
    git clone 
        eg git clone https://github.com/chisumo2016/devops_course_first_repo.git
    ls 

# COMMIT AND PUSH 
    git add README.md
    git commit -m ""
    git push
    git status
    git log --online - see the commit you have push into git hub

   NB: commit the changes and push into github

# GIT BRANCHING 
    Green Color - Master
    
    Local branch where the developer can experient and develop a new features .
    Main need to be protect 
    We put the test code and verified code nothing 
    It's a copy of the main branch
       move one directory back cd ../

    -> Like an alternative timeline (not frm Dr . Strange )

    
        Gitgub repo ----> Main Branch ---> Create New Branch

    Create Branch from Github ->click  branch ---> Click New Brancg Button --> add new eg 
        my_first_custom_branch -> Click new branch

    When yoou click the github repos - will 2 branches 
        defaul branch - main
        custom branch - my_first_custom_branch
        Active branches is one i am goin to work on it

    Terminal type pwd

    I can see the branch in githup repost but not in local PC , I need the latest branch
    We nee to FETCH / RETRIEVE THE BRANCH TO OUR LOCAL PC
    To see how many branch we have in our local PC
        git branch -a 

    FETCH BRANCH
        git fetch 
        git branch -a 

    SWitch to particular branch eg my_first_custom_branch and start work on it 
        git checkout  <branch_name>
        git checkout  my_first_custom_branch

    Verify if you have switched off
        git branch -a 

    You can start to work on this branch on your local machine without touch the main.

    touch my_new_file_in_branch.html
        ls
    To commit and add the particular file
        git status
        git add my_new_file_in_branch.html
        git status

    EXAMPLE
        git add index.html
        git branch nav-bar
        git status
        git branch

    MOVE TO DIFFERENT BRANCH
            git checkout nav-bar
            git branch
            touch nav-bar.html
            git status
            git add .
            git commit -m "Add the nav bar "

    SWITCH THE BRANCH
            git checkout main
    After i made a switch ,the file I created is completely gone . 
    Why is gone ? Not merged
    Work on something on main 
        touch hero-section
        git add hero-section.html
        git commit -m "add hero section to code base "
        git checkout nav-bar
        The hero section is gone 
        git checkout main


    HEAD -> MAIN
        Head points to where a branch is current at
        git log online
        22ec30e (HEAD -> main) add hero section to code base
        7fd016e add index file
        7802bf1 add index file

        git checkout nav-bar
        git log --oneline

        82dc7b5 (HEAD -> nav-bar) add navbar to code base
        7fd016e add index file
        7802bf1 add index file

    COMMAND FOR BRANCH
        git branch
        git branch bugfix
        git switch/checkout  bugfix   move to another branch
        git log
        git switch/checkout master
        git switch -c dark-mock     (create a branch and move there)
        git checkout -b bink-mode   (create a branch and move there)
    -> Commit before switching to another branch
    -> Go to .git folder and checkout HEAD file
        
# MERGING THE BRANCHES
    git switch main
    git  merge bugfix
    Fast forward merge

    -> Not fast forward merge

    -> git tries best to solve CONFLICTS

    EXAMPLE 
        git branch
          main
        * nav-bar

    I need to bring nav-bar to master 
        git checkout main
        git merge nav-bar
        git log --oneline

    DELETE THE BRANCH
        git checkout -d nav-bar
        git branch


    Red - Local machine
    Green - Git is aware of particular file 
    Git Commit message
        git commit -m "feat: This if my first file in repo"

    Refresh the github , the file not available in branch

    Push file to branch
        git push
             55fd7ce..153a663  my_first_custom_branch -> my_first_custom_branch


    PULL REQUEST
        Pull request can be reviewed by developer, what code are you pushing to the main branch

    CREATE THE PULL REQUEST FROM GITHUB REPOS
        Click -> Compare & pull request button - Green Color

            DESTINATION (base: main) .        Source compare: my_custom_branch

        Write some meaning title and description

        Click pull request button

    ASSIGN TO A REVIEWER 
        Assign to reviewer to check my code 
        Reviewer will open an account and see what you have written
            Click Review Change Button -> three option will appear
                    Commit
                    Approve
                    Request changes
    

            Reviewer can write a message eg (changes looks i am approving please go ahead and release
                            the changes 
                Click Submit review

        Click Merge pull request Button - Green color THEN Confirm merge
        
    FULL CYCLE COMPLETED ON HOW TO PUSH THE CODE TO THE MAIN BRANCH


# VISUAL STUDIO + GIT 
        click on ... dots
                branch -> create from branch  eg visual_studio_custom_branch

# BRANCH
    git branch

    
# GITHUB : GIT RESET (Undoing change)
        Developer mistake
        git reset (--soft , --mixed , --hard)
            feature-1.text
            feature-2.text
            feature-3.text
            feature-4.text
            feature-5.text
        Each of them has different commit on theme


        git reset --mixed 
        git reset --mixed  153a663
        git status
        git push

        color will be red , unstage area 

    Push our changes
        local not exist  and github exist
        git push -f

    git reset --soft
       file  will be in the staging area you dont need to add the file again
        git log --online
        git reset --soft  153a663
        git status .    color will be green
        git push -f . 

        If you do git status ,the file will be in staging area .

    git reset --hard
        Dangerous command
        Loose all the history and no turning back
        No staging area 
    git log --online 
        git reset --hard . 153a663
        git status 
        git log --online
        No staging area 
    git push -f 

        All commit will go to the feature 2 nd 1 
        

# 10 GIT COMMIT --AMEND 
    Modify the previous commit
    Add new changes in the file 
    Will pick the latest /last commit message you have ammended 
    edit mmesage
    Is useful before you push my code to the main repo or branch
    before pushing into repo or branch
    git commit --amend
    git log --online
        esc 
        :wq enter
    git log --oneline

    Take more further 
        modify my file and message

    73c3856 (HEAD -> main) feat: featured added for demo . - I dont want to modiy the message
        But I have modified the file 
    git status
        git add feature-2.text

    git commit --amend
    press esc
    :wq

# GIT CHECRY PICK ?
    Picking the feature from another branch is calling cherry pick
    Multiple developer working on single on repostitory
    git cherry-pick <commit-shash>
        example
        Branch-1 . developer 1
            feature-1.text
            feature-2.text
                feature-4.text
            developer 1 has decided to work on  feature-4.text

         Branch-2 . developer 2
            feature-1.text
            feature-2.text
                feature-3.text
            developer 2 has decided to work on feature-3.text

        Developer 1  is dependant to branch 2


        To pick feature-3.text to branch- 1 after completed with developer 2 

        On main branch will be feaaure 1 and 2

        Pick the changes from Branch 2
            feature-3.text

        git checkout branch-2
            git log --online
            git checkout branch-1
            git brach
            git cherry-pick  1233333 
            ls  
        git push - will pushed to branch one

        Main branch still 1,2

# GIT REBASE INTERACTIVE - scarying word 
    merge multile commit in a single   commit
    git rebase --i or interactive
        -> squash commit
        -> rewring the history
        -> Reword / Reorder commit
        -> Drop(delete) commit
        -> Exec run a custom commend in btn commit
    -> alternative  to merging - merge in single line timeline 
    -> clean up tool (clean up commits) or rewritin the history
        
        RULES: Indentify the previous commit

        git log --oneline
        git rebase -i a1ae72f

        In edit mode 
            add squash
    git push -f 

            EXAMPLE
                git status
                git branch

    NB NEVER NEVER RUN THIS COMMAND IN MASTER / MAIN BRANCH , MEANT TO RUN ON SIDE BRANCH
        git init 
            work & commit on main branch
        git switch -c footer
            work and add a footer in feature branch

        git commit -am "add footer text"
        git switch main
            work and hero section on main branch
        git switch footer
        git merge main
            work and add more info in footer
            if there is more worn on main , do more merge
        -> Get on footer branch and rebase
        git rebase main
            work and add more on main branch
            move to footer branch
        git rebase main

    NB: NEVER REBASE COMMITS THAT YOU HAVE SHARES 
        PUSH TO GITHUB -> NEVER REBASE

        EXAMPLE OF REBASE
            git branch
                 footer
                    * main
                      nav-bar
            git status
                modified:   index.html
            git commit -am "updated main website"
            git checkout bugfix
            git commit -am "updated navbar"
        I need to do more work in master branch
            git checkout main
            git commit -am "images added"
            git checkout bugfix
                It would be nice to bring the codebbase from main branch to bugfix branch
            
            git branch

                * bugfix
                    footer
                    main
                    nav-bar
            git merge main
            git commit -am "about us fixed"
            git checkout main
            git commit -am "pricing card  added"

        Now the magic comes
            git log --oneline
            git checkout bugfix
            git log --oneline
        These merge commit message are not good and people they dont like it .
            git branch
                * bugfix
                    footer
        We're going to brring all changes to bugfix and Not MASTER .
            git rebase main
            git branch
                    * bugfix
                    footer
            git commit -am "home tab fixed"
            git checkout main
            ggit commit -am "why us section added"

    WORK ON CONFLICTS AS WELL 
            git branch
                * main
                 nav-bar
            git checkout bugfix
            git commit -am "add card to index file"
            git branch 
                * bugfix
                    footer
            git rebase main
                    Auto-merging index.html
                    CONFLICT (content): Merge conflict in index.html
                    error: could not apply bd03f4a... add card to index file
                    hint: Resolve all conflicts manually, mark them as resolved with
                    hint: "git add/rm <conflicted_files>", then run "git rebase --continue".
                    hint: You can instead skip this commit: run "git rebase --skip".
                    hint: To abort and get back to the state before "git rebase", run "git rebase --abort".
                    hint: Disable this message with "git config set advice.mergeConflict false"
                    Could not apply bd03f4a... # add card to index file
            Fix the problem manually on editor
            git add index.html
            git rebase --continue

           
# GIT REBASE INTERACTIVE REORDER
            Reorder
    git log --oneline
    git rebase -i 07774744 enter
        vim editor
        cut press twice
         paster
        esc
        :wq
    git log --oneline
    git push -f 


# GIT REBASE INTERACTIVE DROP
    commit w/c are not relevant
    DROP . - history
    git log --oneline
    git rebase -i 344555
        edit mode
        press i
        
    remove pick and put drop
         esc
        :wq

    git push -f 

# GIT REBASE INTERACTIVE EXEC
        Add shell command , automation 
        Add multiple
        look the previous commit always
        git log --oneline
      Not used  with developer

        git rebase -i 344555
             edit mode
                press i
            exec echo "this is custom= executed after feature 1"
             esc
            :wq

        
#   GIT BISECT 
        Bug w/c has been introduced to previous commit history
        identify the git commit which introduced the bug in the repository
                git biscet start
                grep 'BUG' *.text
                git biscet bad
                git biscet good fb484884 .  point will move 9
                grep 'BUG' *.text
                git biscet good fb34566
                grep 'BUG' *.text
                git biscet bad 344445666
                grep 'BUG' *.text
                git biscet bad 6664RR
                grep 'BUG' *.text .  
                git bisect good 66666

        git bisect log

# GIT STASH
        -> create a repo , work and commit on main
        ->Switch to another branch and work
        -> CONFLICTING CHANGES DO NOT ALLOW TO SWITCH BRANCH , WITHOUT COMMITS
        -> unfinished featured and developer want to work on those features
            git stash  
                track and untrack file 
                you can switch branch
            git stash -u

            git pop . (bring back changes)
            git apply   (apply changes abd keep them in stash)

            git stash list
            git stash show      

            git stash drop
            git stash clear

        git stash - fridge as acting as stash batter for Cake
        github    - kitchen   branch

        test-branch-1
            </> change-1.txt
            </> change-2.txt


                    Backet
                        stash to store logic changes
        git stash -u   
        git stash list
                start with stash@{0}
        touch change-2.txt
            git stash -u
            git stash list


        How to pop back ,last change  will be the first to pop back 
            git status
            git stash pop
            git stash list
            git stash pop  will bring the first file 
            git stash list

        git status
        git add change-1.txt
        git stash
        git stash list
        git stash pop  , the stash will be empty
        git status

    Git Apply
        git status 
        git stash list
        git stash
        git status 
        git stash apply  , item will still there
        git stash list
        git stash apply . stash not empty
        git stash list . 

    Git stash drop
            git status list

    Git stash show
        show the file presence in stash
        git stash 
        git stash list

        eg touch change-2.txt
        git add change-2.txt
        git stash
        git stash list
    
        git stash show stash@{0}

    Git stash clear
        will clear all the stach
        git stash list
        git stash clear
            git stash clear

        NO CHANCE TO RECOVER


        EXAMPLE 
            git status
            git branch
                  footer
                * main
                  nav-bar

        git switch -c bugfix    
            * bugfix
                footer
            footer.html
                trying to fix this bug
            git status

        You collegues is asking to come and work to another this ,
            git switch footer
                Error
                error: Your local changes to the following files would be overwritten by checkout:
                footer.html
                Please commit your changes or stash them before you switch branches.
                Aborting

            git branch 
                    git switch footer
                    * bugfix
                      footer
                      main

            To avoid the above error , you need to use stash

               git switch footer
                         bugfix
                            * footer
                              main
                              nav-bar
                git switch bugfix
                        * bugfix
                            footer
                            main
                            nav-bar

            To bring back thing from the shelf we use pop
            git stash pop

        Can I pop to another btanches ? Can be moved to branch to branch
            git switch main
            git stash pop
            git stash list
            git stash 
            git stash list  
                stash@{0}: WIP on main: 0be3204 added all files
            git stash appy stash@{3}

            
# GIT DIFF  (Informative command)
        You can use quite alot 
        Compare working with staging
        To find the difference btn the current commit and previous commit
        To find the historical git history
        

        HOW TO READ DIFF
            . a  -> file1  & b->file2 (same file overtime) BUT information has been changed 
            . ---   file1    indicate changes in file
            . +++   file2
            . change in lines abd little preview of it

        ---  represent a . before stagong
        ++++ represent b .  after staging
        compare one in stage and not stage

            EXAMPLE
                git status
                On branch main
                nothing to commit, working tree clean

            OPEN index.html add some code

            

        git diff
        git diff --staged  - show the stage and main branch

            diff --git a/index.html b/index.html
                index 98f706c..e5cdc37 100644
                --- a/index.html
                +++ b/index.html


                 <title>Document</title>
                         </head>
                         <body>
                        -    looks good as project
                        -
                        -
                        +    I would love to add nav bar here
                        +    looks good  project
                             footer was added succefully
                         </body>
                         </html>

            git commit -m "noce message"

            git diff f7c374c 44b42c9
            git diff f7c374c..44b42c9
            git diff branchone..branchtwo

        git diff --no-index compare two file together
        git diff --word-diff

        git diff --w . - identify if there's white space
        git diff  <hash1><hash2> historical git commit

        git diff --stat  s

        1: GIT DIFF
                From local repositor to remote repo
            feature-1.txt
            feature-2.txt . ------> backet ------git diff
                                    Staged changes            
                                    Git add feature-2.txt        
            feature.txt

            git status 

        2: GIT DIFF --stagged
                From local repositor to remote repo
                view the file
            feature-1.txt
            feature-2.txt . ------> backet ------git diff
                                    Staged changes            
                                    Git add feature-2.txt        
            feature.txt

            git status 

         3: GIT DIFF --w
                ignore white spaces
                From local repositor to remote repo
                view the file
            feature-1.txt
            feature-2.txt . ------> backet ------git diff
                                    Staged changes            
                                    Git add feature-2.txt        
            feature.txt

            git status 

         4: GIT DIFF --no-index
                compare complete same two files
                compare complete different two files
                From local repositor to remote repo
                view the file
            feature-1.txt
            feature-2.txt . ------> backet ------git diff
                                    Staged changes            
                                    Git add feature-2.txt        
            feature.txt

            git status 
                git diff --no-index featur-1e.txt feature-2.txt


        4: GIT DIFF HASH
            degug the code
                git log online
                guit diff a1ae72f  55fd7ce


        4: GIT DIFF WORD-DIFF
            Check the change you have made 
            git diff --word-diff
            degug the code
                git log online
                git diff --word-diff 

         4: GIT DIFF STAT
            Overllow summary 
            git diff --stat

# GIT LOG
        large project 
        git log 
        git log --oneline
        git log --oneline --decorate
        git log --stat
        git log --p . change you have done / modified  inside the commit
        git log --shortlog
        git log --graph 
        git log --graph --online 
        git log --graph --oneline --decorate
        git log --pretty=format:"%cn %h % cd
        git log --pretty=format:"%cn  commited %h  on % cd
        git log --after="2025-1-1"
        git log --after="2025-1-1" --oneline
        git log --grep="JRA-224"  search custom msg
        git log --grep="JRA-224" --oneline search custom msg

# GIT .GITIGNORE
        touch .gitignore
        Ignore some of file 
        exclude from git commit
        git status
        .gitignore
            /.idea/
            *.log

        -> Dont't want to track some files
        -> node modules , API key , secret
        -> get template online , patterns can tricky

    => Commit behind the scene
        git log --oneline
            b4b7f3a (HEAD -> main) add third line
            631d439 added the second commit to the second file  two
            3223e3d add file one
        ech one depend on each other except the first 

       1: Hash (b4b7f3a) . - first commit
            parent ->null
            Info

      2:   Hash (b4b7f4a) point to the previous checkout
            parent ->null
            Info

      3   Hash (b4b773a) point to the previous checkout
            parent ->null
            Info
            
        gitignore generator 
        https://www.toptal.com/developers/gitignore

        pwd
        /Users/developer
        cat .gitconfig


# GIT MERGE &  GIT CONFILICT 
        move one directory back cd ../

    -> Like an alternative timeline (not frm Dr . Strange )

        
# MERGE CONFLICT
        Two develover are working on the same file ,
    
    1: feature/update-version


        task to update    </> config.tx 

            version=2.0



                MAIN


    2: hotfix/hotfix/emergency-path
            
            </> config.tx 

            version=1.1


        create a branch
            git checkout -b feature/update-version
                echo "version=2.0" > config.txt
            cat config.txt
            git add .
            git commit -m "Update version to 2.0"

        Switch back to Main brach
            git checkout Main
                git checkout -b hotfix/hotfix/emergency-path
                    echo "version=1.1" > config.txt
                git add .
                git commit -m "Urgent hotfix: Set version to 1.0"
                cat config.txt
            git branch
                feature/update-version
                hotfix/hotfix/emergency-path
                main version 1.0

        Developer 1 went and merge the particular change into Main

        To merge the particular one .
          git brach
            feature/update-version
                *hotfix/hotfix/emergency-path . 
            
        First checkout to main branch
            git checkoout main
            git branch
                feature/update-version
                hotfix/hotfix/emergency-path
                MAIN - SHOW GREEN

            merge the feature/update-version TO MAIN
                git merge feature/update-version
            cat confi.txt


        Take the second branch and merge to Main
             git merge hotfix/hotfix/emergency-path

        CONFLICT : Merge conflict in config.tx
        Automatic merge failed ; fix confilicts and the commit the results

        cat config.txt
            <<<<<<<<< HEAD
            Version=2.0
            =========== . (The above in one change and below is one change)
            version=1.1
            >>>>>>>>hotfix/hotfix/emergency-path

        To resolve the confilict
            vi config.tx

            delete the line 

        git status
        git add config.txt
        git commit -m "feat: resolving the conflict"

# CONFLICT 
        Git tricks best to resolve CONFLICT

        git branch 
              footer
                * main
                  nav-bar

        index.html .  -- modified 
        git status
                   modified:   index.html
        git add index.html
        git commit -m "add footer index file"


        NOW WATCH HERRE AND PAY ATTENTION
            git checkout footer
            index.html file 
             the index page is nothing is updated , add the any code 

            git add index.html
            git commit -m "update index file with footer code"

        CHECKOUT IN MASTER 
            git checkout main
            git checkout footer


            <<<<<< HEAD
            line 1              Master / Main branch
            line 2              branch that you are on
            ==============
           line 3 .   -------> Conflict that came from
                        Coming from anothe branch
            >>>>>>>>>bug fix

                Keep that you want , remove markers and  save
                Keep all , keep the master or keep the code from another branch

            Make sure you discuss with ur collegue 

            git branch 
                * footer
                main
                nav-bar
            git checkout main
            git merge footer

                git merge footer
                    Auto-merging index.html
                    CONFLICT (content): Merge conflict in index.html
                    Automatic merge failed; fix conflicts and then commit the result.
            
            git commit -m "merged footer branch"


# MORE COMMANDS 
        git checkout <Hash> 
            Detach Head : new branch

            Example
                git checkout 22ec30e

                How  do I go back ? 
                    git log --oneline
                    git checkout main
                    git reflog .  -> move back where u have been


        git switch main
            Re-attach Head
        git checkout HEAD~2
            git checkout HEAD~2
            git log --online
            Look at 2 commit prior
                23b7998
            git checkout main
        git restore filename 
            Get back to last commit version


# PUSHING CODE TO GITHUB
        https://docs.github.com/en/get-started
    - services
    Git hub works with SSH Key , you have to generate
    -> Generating a new SSH key and adding to the ssh-agent
            ssh-keygen -t ed25519 -C "your_email@example.com"
    -> Adding a new SSH key to your GitHub Account
            ssh-keygen -t ed25519 -C "your_email@example.com"
            $ eval "$(ssh-agent -s)"
    -> First, check to see if your ~/.ssh/config file exists in the default location.
            $ open ~/.ssh/config
            > The file /Users/YOU/.ssh/config does not exist.

    -> If the file doesn't exist, create the file.
            touch ~/.ssh/config

# START WORKING ON NEW DIRECTORY
        pwd
        cd gitthree/

# GITHUB DISCUSSION
    Git is a software and Github is service to host git online
    . Guthub -> collaboration + Backup + Open Source
        eg GITLAB OR BITBUCKET
        git clone <url>
        git config --global  user.name "bernard robert"
        git config --global  user.name "test@gmail.com"

    . Setup SSH keys to connect with github , github uses SSH to allow you to push code .
        Password based code push is not allowed .

    . CHECK INSTRUCTION FOR YOUR OS ON GITHUB WEBSITE , AS THAT'S BEST AND UPDATED RESOURCE


 # CODE  FOR REMOTE REPOSITORY
        git remote -v 
                To find if the remote repository has been setup
                if the command is return empty , not setup
        git remote add NAME  URL
        git remote add  origin https:........
            git remote add origin https://github.com/chisumo2016/learn-git.git
            git remote -v
                origin	https://github.com/chisumo2016/learn-git.git (fetch)
                origin	https://github.com/chisumo2016/learn-git.git (push)
        git remote rename oldname newname
        git remote remove name

        git push <remote> <branch>
            eg git push origin main
        git push <remote> LOCALBRANCH : REMOVEBRANCH

        git push -u origin main
        
        -> U setup an upstream that allow you to run future command 
        git push

                git push
                    fatal: The current branch main has no upstream branch.
                    To push the current branch and set the remote as upstream, use
                    
                        git push --set-upstream origin main
                    
                    To have this happen automatically for branches without a tracking
                    upstream, see 'push.autoSetupRemote' in 'git help config'.
                Linking origin and main

# CLONE REPOS
    When you clone a repo , you get just main branch connected 
    Rest of remote branches are not connected
        git switch branch-name
    Connects remore branch to local
        git branch -r

        Work  --------- | Stage ------- | Local Repo |---------Remote Repo |

                                                      <-----git fetch------|
                                                        get info but don't put in my work
            
            <----------------git pull------------------------------------
                                Get info and add it in my work

        git pull = git fetch + git merge
        git pull origin main (changes will be merge to main) whatever its there in the origin .

        Pull and Fetch -> bring the updated code from remoted repository

# DISCUSS GITHUB FEATURES ON WEBSITE LIKE
    - add collaborators
    - Readme file
    - Markdown format
    - Adding Gists
    - Code Spaces
    - Dev container
        All thisis discussed in class or video

# PULL REQUEST - OPEN SOURCE
        https://freeapi.app/
        https://excalidraw.com/

    STEPS
        
        Open an issue
        Get the issue assigned
        Work and add value
        Make PR and iterate over it
        Have Patience
        Making PR is not a job guarantee

# INORDER TO MAKE PULL REQUEST
    -> click Fork button
        Will bring the entire source code to my account
    -> Click fork button -> bring the code to our acc
    -> git clone https://github.com/hiteshchoudhary/open-source.git
        -> git status
    Make the branch instead of working in master
        -> git  branch
        -> git checkout -b navbar
        -> git add nabar.htm
        -> git commit -m "ddd"
            git remove -v
            git push  origin navbar

# COMPARE & PULL REQUEST
    click compare and pull request
        base  <--- head repository  <----compare
        Add a title : Write meaning title
        Add a description : Write meaning title
    Click Create pull request button
    Click Merge pull request button
    Click Merge button




















    















        
            





























            
                































#
#
#
    
    























































































    









































    





























    









































































        
















































        












    




    
# COMMIT AND PUSH 
# COMMIT AND PUSH 
# COMMIT AND PUSH 
# COMMIT AND PUSH 
# COMMIT AND PUSH 
    
