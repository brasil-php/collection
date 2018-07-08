#!/usr/bin/env bash

RELEASE_TYPE=${1}
RELEASE_TYPES="major,minor,patch,help"
RELEASE_VERSION=""

PACKAGIST_USER="xxx"
PACKAGIST_API_TOKEN="<xxx>"
PACKAGIST_PACKAGE_URL="https://github.com/xxx/xxx"
if [ -f ".env" ]; then
   source ./.env
fi

# Num  Colour    #define         R G B
# 0    black     COLOR_BLACK     0,0,0
# 1    red       COLOR_RED       1,0,0
# 2    green     COLOR_GREEN     0,1,0
# 3    yellow    COLOR_YELLOW    1,1,0
# 4    blue      COLOR_BLUE      0,0,1
# 5    magenta   COLOR_MAGENTA   1,0,1
# 6    cyan      COLOR_CYAN      0,1,1
# 7    white     COLOR_WHITE     1,1,1
red=`tput setaf 1`
green=`tput setaf 2`
yellow=`tput setaf 3`
reset=`tput sgr0`
hr="---------------------------------------------------"

echo "${green}"
echo "# Update composer.json script${reset}"
echo "${hr}"

if [ -z ${RELEASE_TYPE} ];then
  RELEASE_TYPE="help"
fi

if [[ ! ",$RELEASE_TYPES," =~ ",$RELEASE_TYPE," ]]; then
  echo "${red}You need to enter one of these options: $RELEASE_TYPES${reset}"
  echo "${hr}"
  echo ""
  exit
fi

RELEASE_CHANGES=$(git status --porcelain)
if [ "${RELEASE_CHANGES}" ]; then
  echo "${red}Please commit staged files prior to publish${reset}"
  echo "${hr}"
  echo ""
  exit
fi

function __update {
  RELEASE_CURRENT=$(sed -n 's/.*"version": "\(.*\)",/\1/p' composer.json)
  echo "Current version .: $RELEASE_CURRENT"

  a=( ${RELEASE_CURRENT//./ } )
  if [[ ${RELEASE_TYPE} = "major" ]]; then
    ((a[0]++))
    a[1]=0
    a[2]=0
  fi
  if [[ ${RELEASE_TYPE} = "minor" ]]; then
    ((a[1]++))
    a[2]=0
  fi
  if [[ ${RELEASE_TYPE} = "patch" ]]; then
    ((a[2]++))
  fi
  RELEASE_VERSION="${a[0]}.${a[1]}.${a[2]}"
  echo "New version .....: $RELEASE_VERSION"

  sed -i -E "s/\"version\":\s?\"$RELEASE_CURRENT\"/\"version\": \"$RELEASE_VERSION\"/g" composer.json
  echo ""
}

function __publish {
  git add composer.json
  git commit -m "[release] Publish to ${RELEASE_VERSION}"
  git push origin master
  git tag -a ${RELEASE_VERSION} -m "[release] Publish tag ${RELEASE_VERSION}"
  git push origin ${RELEASE_VERSION}

  if [[ ! -z ${PACKAGIST_API_TOKEN} && ! -z ${PACKAGIST_PACKAGE_URL} ]];then
    curl -XPOST \
      -H'content-type:application/json' "https://packagist.org/api/update-package?username=${PACKAGIST_USER}&apiToken=${PACKAGIST_API_TOKEN}" \
      -d"{\"repository\":{\"url\":\"${PACKAGIST_PACKAGE_URL}\"}}"
  fi
  echo ""
}

function __help {
  echo "Help:"
  echo "\$ $(basename $0) [${RELEASE_TYPES}]"
  echo ""
}

if [ "${RELEASE_TYPE}" = "help" ]; then
  __help
  exit
fi

if [ ! -d ".git" ]; then
  __update
  exit
fi

__update

echo -n "${yellow}Run push to master and publish tag? [y/n] $ ${reset}"
read -n 1 GO </dev/tty || {
  GO="y"
}
echo ""
if [[ ${GO} = "y" ]]; then
  __publish
fi
echo "${hr}"
echo ""