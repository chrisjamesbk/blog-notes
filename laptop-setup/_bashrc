alias gp='git pull'
alias gs='git status'
alias home='cd ~/'
alias drop='cd ~/Dropbox/'
alias sites='cd ~/Dropbox/Sites'
alias free='cd ~/Dropbox/Sites/Freelance'
alias webfaction='ssh chrisjames03@chrisjamesbk.com'

# Prompt Colors
BGREEN='\[\033[1;32m\]'
GREEN='\[\033[0;32m\]'
BRED='\[\033[1;31m\]'
RED='\[\033[0;31m\]'
BBLUE='\[\033[1;34m\]'
BLUE='\[\033[0;34m\]'
NORMAL='\[\033[00m\]'

extract () {
  if [ -f $1 ] ; then
case $1 in
      *.tar.bz2) tar xjf $1 ;;
      *.tar.gz) tar xzf $1 ;;
      *.bz2) bunzip2 $1 ;;
      *.rar) unrar x $1 ;;
      *.gz) gunzip $1 ;;
      *.tar) tar xf $1 ;;
      *.tbz2) tar xjf $1 ;;
      *.tgz) tar xzf $1 ;;
      *.zip) unzip $1 ;;
      *.Z) uncompress $1 ;;
      *) echo "'$1' cannot be extracted via extract()" ;;
  esac
else
echo "'$1' is not a valid file"
  fi
}

mcd () {
  mkdir "$@" && cd "$@"
}

parse_git_branch(){ git branch 2> /dev/null | sed -e '/^[^*]/d' -e 's/* \(.*\)/(\1) /'; }

cp_p()
{
   strace -q -ewrite cp -- "${1}" "${2}" 2>&1 \
      | awk '{
count += $NF
if (count % 10 == 0) {
percent = count / total_size * 100
printf "%3d%% [", percent
for (i=0;i<=percent;i++)
printf "="
printf ">"
for (i=percent;i<100;i++)
printf " "
printf "]\r"
}
}
END { print "" }' total_size=$(stat -c '%s' "${1}") count=0
}

PS1="${BLUE}(${NORMAL}\w${BLUE})${GREEN} \$(parse_git_branch)${NORMAL}\u${BLUE}@\h${RED}\$ ${NORMAL}"