#!/bin/bash

cd config/sync
ls -l

echo " "
echo "-----------------------------------"
echo " "
echo "#The current git top level folder is:"
git rev-parse --show-toplevel

echo " "
read -p "Is this the right git top-level folder? (y/n) " -n 1 -r
echo ' '

if [[ $REPLY =~ ^[Yy]$ ]]
then
    echo " "
    git status -u --porcelain

    if [ -z "$(git status --porcelain)" ]; then
      echo "Working directory is clean - there is no config files to copy into c2bdistro install"
      exit
    else

      echo " "
      read -p "Do you want to copy these files into c2bdistro project install? (y/n) " -n 1 -r

      if [[ $REPLY =~ ^[Yy]$ ]]
      then
        echo " "
        echo "#cp files into c2bdistro install"
        echo " "
        while IFS= read -r -d '' line <&3; do
          DIR="$(dirname "${line:3}")" ; FILE="$(basename "${line:3}")"

          if [ "${FILE}" != "${0##*/}" ]; then
              mkdir -p ../../web/profiles/contrib/c2bdistro/config/install/"${DIR}" && cp "${line:3}" ../../web/profiles/contrib/c2bdistro/config/install/"${line:3}"
          fi
          echo ${line:3}
        done 3< <(git status -u --porcelain -z)
        find ../../web/profiles/contrib/c2bdistro/config/install/ -type f -exec sed -i -e '/^uuid: /d' {} \;
        find ../../web/profiles/contrib/c2bdistro/config/install/ -type f -exec sed -i -e '/_core:/,+1d' {} \;
      else
        echo " "
        echo 'Aborted...'
      fi

    fi
else
      echo " "
      echo 'Aborted...'
fi

