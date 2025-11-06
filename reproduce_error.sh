for i in {1..15}; do
  echo "----------------------------------------------"
  echo "🔁 Iteration $i"
  git add .
  git commit -m "test iteration $i" >/dev/null 2>&1
  git push >/dev/null 2>&1

  echo "🚀 Triggering build via syncPluginSet.sh..."
  ~/workspace/scripts/syncPluginSet.sh 70503 6 >/dev/null 2>&1

  echo "⏳ Waiting 2 seconds before checking..."
  sleep 2

  echo "🔍 Build status:"
  curl -s -H "Authorization: Bearer <TOKEN>" \
       "https://p70503.my.plentysystems.com/rest/plugin_sets/6/dev_mode/build" \
       | jq '{
          startTime: .startTime,
          finishTime: .finishTime,
          stepsStatus: .stepsStatus,
          buildErrors: .buildErrors
        }'

  sleep 2
done
