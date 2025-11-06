for i in {1..10}; do
  echo "----------------------------------------------"
  echo "⚙️ Iteration $i - creating commit..."
  echo "// $(date)" >> devmode_test.txt
  git add .
  git commit -m "force race build $i" >/dev/null 2>&1
  git push >/dev/null 2>&1

  echo "🚀 Triggering first build..."
  curl -s -X POST -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZTNjNDBlN2M5MDk4N2UwYTA4MDA2ZWY2YmM0NDMzZjNlYzU1MzRmYTVlYTVmMjg4M2FhZmI0ZDg4OWRjOWQzZmVjNGUwNThhNTZkNmFjMWYiLCJpYXQiOjE3NjI0MTk1NjEuMzU3MywibmJmIjoxNzYyNDE5NTYxLjM1NzMsImV4cCI6MTc2MjUwNTk2MS4zNTIsInN1YiI6IjMiLCJzY29wZXMiOlsiKiJdfQ.z1ggUynVfFiXROVIdQtHUxvE77mBKPr8uWK1TJJhx4H-Db7dldy-hikCMFL2VCG1TqY_KKqq2H3IHZ2wT4Qbf9WBZ9qG8rsTh8Zdsy4jB70wZWNNtQgyQimE3bcAaYDiXIwUcIG7SKFJBM7Dq_3CEurh5waSR8Ctu-Byga2DQ6f6QnvMW_9hxsSxUFgnCaiAmsmgq3uFwyoZB7lWCIQFNiaXqLxJP_9Si8Vt13dzUT-rFjEjbbjpKq-ZUTkuF20e0BxvXvMeOLANjDMVY6IKXM32X3LZV8wS4tvcTXxonkCFZrWavJHzMAVEBWV9KIN6Fi9g49tMkNmnPRLK510O9K1MppXe4NQMXKORjUy0H6EVi1Dx9lXE23JjguCKjfhqdS2nLXTUBnPCIptt0Alr9Jmn4e1gDIiTCQjmNUJe-jnkTuXknw6hO2DiMvbL5lg40SU7cwuP4BGCT4_P9NRGxiV0pQEQ1ImAdl6ob4wVQrjU48TTsO9DAUspEzsdlfxpJBPRS5NLgJkF7XMpyzyE_TUo9vOl0iuAXXCGrPJRfTBVuB7INlq31jP34YMtiYzHd4h9G3YyNLdMQOTXct2AEYFBxb5NMNckTO_3GPEnXt-gGDmnwlnRktdTeEYyGudRnLVMYK94dHlHttIr02TDahsuFoPvnzGCsG2lXydXfRY" \
    -H "Content-Type: application/json" \
    "https://p70503.my.plentysystems.com/rest/plugin_sets/6/dev_mode/build" >/dev/null &

  sleep 1

  echo "🚀 Triggering second overlapping build..."
  curl -s -X POST -H "Authorization: Bearer $TOKEN" \
    -H "Content-Type: application/json" \
    "https://p70503.my.plentysystems.com/rest/plugin_sets/6/dev_mode/build" >/dev/null &

  sleep 3

  echo "🔍 Checking build status..."
  RESPONSE=$(curl -s -H "Authorization: Bearer $TOKEN" \
    "https://p70503.my.plentysystems.com/rest/plugin_sets/6/dev_mode/build")
  echo "$RESPONSE" | jq '{start: .startTime, finish: .finishTime, error: .buildErrors.files}'

  if echo "$RESPONSE" | grep -q "worktree contains unstaged changes"; then
    echo "🎯 Reprodus! Eroarea a apărut în iterația $i"
    break
  fi

  echo "✅ No error yet, next round..."
  sleep 2
done
