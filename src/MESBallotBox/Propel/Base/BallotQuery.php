<?php

namespace MESBallotBox\Propel\Base;

use \Exception;
use \PDO;
use MESBallotBox\Propel\Ballot as ChildBallot;
use MESBallotBox\Propel\BallotQuery as ChildBallotQuery;
use MESBallotBox\Propel\Map\BallotTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Ballot' table.
 *
 *
 *
 * @method     ChildBallotQuery orderByid($order = Criteria::ASC) Order by the id column
 * @method     ChildBallotQuery orderByuserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildBallotQuery orderByname($order = Criteria::ASC) Order by the name column
 * @method     ChildBallotQuery orderBystartTime($order = Criteria::ASC) Order by the start_time column
 * @method     ChildBallotQuery orderByendTime($order = Criteria::ASC) Order by the end_time column
 * @method     ChildBallotQuery orderBytimezone($order = Criteria::ASC) Order by the timezone column
 * @method     ChildBallotQuery orderByversionCreatedBy($order = Criteria::ASC) Order by the version_created_by column
 * @method     ChildBallotQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildBallotQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ChildBallotQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method     ChildBallotQuery orderByVersionCreatedAt($order = Criteria::ASC) Order by the version_created_at column
 *
 * @method     ChildBallotQuery groupByid() Group by the id column
 * @method     ChildBallotQuery groupByuserId() Group by the user_id column
 * @method     ChildBallotQuery groupByname() Group by the name column
 * @method     ChildBallotQuery groupBystartTime() Group by the start_time column
 * @method     ChildBallotQuery groupByendTime() Group by the end_time column
 * @method     ChildBallotQuery groupBytimezone() Group by the timezone column
 * @method     ChildBallotQuery groupByversionCreatedBy() Group by the version_created_by column
 * @method     ChildBallotQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildBallotQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ChildBallotQuery groupByVersion() Group by the version column
 * @method     ChildBallotQuery groupByVersionCreatedAt() Group by the version_created_at column
 *
 * @method     ChildBallotQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBallotQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBallotQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBallotQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBallotQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBallotQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBallotQuery leftJoinVoter($relationAlias = null) Adds a LEFT JOIN clause to the query using the Voter relation
 * @method     ChildBallotQuery rightJoinVoter($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Voter relation
 * @method     ChildBallotQuery innerJoinVoter($relationAlias = null) Adds a INNER JOIN clause to the query using the Voter relation
 *
 * @method     ChildBallotQuery joinWithVoter($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Voter relation
 *
 * @method     ChildBallotQuery leftJoinWithVoter() Adds a LEFT JOIN clause and with to the query using the Voter relation
 * @method     ChildBallotQuery rightJoinWithVoter() Adds a RIGHT JOIN clause and with to the query using the Voter relation
 * @method     ChildBallotQuery innerJoinWithVoter() Adds a INNER JOIN clause and with to the query using the Voter relation
 *
 * @method     ChildBallotQuery leftJoinQuestion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Question relation
 * @method     ChildBallotQuery rightJoinQuestion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Question relation
 * @method     ChildBallotQuery innerJoinQuestion($relationAlias = null) Adds a INNER JOIN clause to the query using the Question relation
 *
 * @method     ChildBallotQuery joinWithQuestion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Question relation
 *
 * @method     ChildBallotQuery leftJoinWithQuestion() Adds a LEFT JOIN clause and with to the query using the Question relation
 * @method     ChildBallotQuery rightJoinWithQuestion() Adds a RIGHT JOIN clause and with to the query using the Question relation
 * @method     ChildBallotQuery innerJoinWithQuestion() Adds a INNER JOIN clause and with to the query using the Question relation
 *
 * @method     ChildBallotQuery leftJoinVote($relationAlias = null) Adds a LEFT JOIN clause to the query using the Vote relation
 * @method     ChildBallotQuery rightJoinVote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Vote relation
 * @method     ChildBallotQuery innerJoinVote($relationAlias = null) Adds a INNER JOIN clause to the query using the Vote relation
 *
 * @method     ChildBallotQuery joinWithVote($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Vote relation
 *
 * @method     ChildBallotQuery leftJoinWithVote() Adds a LEFT JOIN clause and with to the query using the Vote relation
 * @method     ChildBallotQuery rightJoinWithVote() Adds a RIGHT JOIN clause and with to the query using the Vote relation
 * @method     ChildBallotQuery innerJoinWithVote() Adds a INNER JOIN clause and with to the query using the Vote relation
 *
 * @method     ChildBallotQuery leftJoinBallotVersion($relationAlias = null) Adds a LEFT JOIN clause to the query using the BallotVersion relation
 * @method     ChildBallotQuery rightJoinBallotVersion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BallotVersion relation
 * @method     ChildBallotQuery innerJoinBallotVersion($relationAlias = null) Adds a INNER JOIN clause to the query using the BallotVersion relation
 *
 * @method     ChildBallotQuery joinWithBallotVersion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the BallotVersion relation
 *
 * @method     ChildBallotQuery leftJoinWithBallotVersion() Adds a LEFT JOIN clause and with to the query using the BallotVersion relation
 * @method     ChildBallotQuery rightJoinWithBallotVersion() Adds a RIGHT JOIN clause and with to the query using the BallotVersion relation
 * @method     ChildBallotQuery innerJoinWithBallotVersion() Adds a INNER JOIN clause and with to the query using the BallotVersion relation
 *
 * @method     \MESBallotBox\Propel\VoterQuery|\MESBallotBox\Propel\QuestionQuery|\MESBallotBox\Propel\VoteQuery|\MESBallotBox\Propel\BallotVersionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildBallot findOne(ConnectionInterface $con = null) Return the first ChildBallot matching the query
 * @method     ChildBallot findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBallot matching the query, or a new ChildBallot object populated from the query conditions when no match is found
 *
 * @method     ChildBallot findOneByid(int $id) Return the first ChildBallot filtered by the id column
 * @method     ChildBallot findOneByuserId(int $user_id) Return the first ChildBallot filtered by the user_id column
 * @method     ChildBallot findOneByname(string $name) Return the first ChildBallot filtered by the name column
 * @method     ChildBallot findOneBystartTime(int $start_time) Return the first ChildBallot filtered by the start_time column
 * @method     ChildBallot findOneByendTime(int $end_time) Return the first ChildBallot filtered by the end_time column
 * @method     ChildBallot findOneBytimezone(int $timezone) Return the first ChildBallot filtered by the timezone column
 * @method     ChildBallot findOneByversionCreatedBy(int $version_created_by) Return the first ChildBallot filtered by the version_created_by column
 * @method     ChildBallot findOneByCreatedAt(string $created_at) Return the first ChildBallot filtered by the created_at column
 * @method     ChildBallot findOneByUpdatedAt(string $updated_at) Return the first ChildBallot filtered by the updated_at column
 * @method     ChildBallot findOneByVersion(int $version) Return the first ChildBallot filtered by the version column
 * @method     ChildBallot findOneByVersionCreatedAt(string $version_created_at) Return the first ChildBallot filtered by the version_created_at column *

 * @method     ChildBallot requirePk($key, ConnectionInterface $con = null) Return the ChildBallot by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBallot requireOne(ConnectionInterface $con = null) Return the first ChildBallot matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBallot requireOneByid(int $id) Return the first ChildBallot filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBallot requireOneByuserId(int $user_id) Return the first ChildBallot filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBallot requireOneByname(string $name) Return the first ChildBallot filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBallot requireOneBystartTime(int $start_time) Return the first ChildBallot filtered by the start_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBallot requireOneByendTime(int $end_time) Return the first ChildBallot filtered by the end_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBallot requireOneBytimezone(int $timezone) Return the first ChildBallot filtered by the timezone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBallot requireOneByversionCreatedBy(int $version_created_by) Return the first ChildBallot filtered by the version_created_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBallot requireOneByCreatedAt(string $created_at) Return the first ChildBallot filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBallot requireOneByUpdatedAt(string $updated_at) Return the first ChildBallot filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBallot requireOneByVersion(int $version) Return the first ChildBallot filtered by the version column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBallot requireOneByVersionCreatedAt(string $version_created_at) Return the first ChildBallot filtered by the version_created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBallot[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBallot objects based on current ModelCriteria
 * @method     ChildBallot[]|ObjectCollection findByid(int $id) Return ChildBallot objects filtered by the id column
 * @method     ChildBallot[]|ObjectCollection findByuserId(int $user_id) Return ChildBallot objects filtered by the user_id column
 * @method     ChildBallot[]|ObjectCollection findByname(string $name) Return ChildBallot objects filtered by the name column
 * @method     ChildBallot[]|ObjectCollection findBystartTime(int $start_time) Return ChildBallot objects filtered by the start_time column
 * @method     ChildBallot[]|ObjectCollection findByendTime(int $end_time) Return ChildBallot objects filtered by the end_time column
 * @method     ChildBallot[]|ObjectCollection findBytimezone(int $timezone) Return ChildBallot objects filtered by the timezone column
 * @method     ChildBallot[]|ObjectCollection findByversionCreatedBy(int $version_created_by) Return ChildBallot objects filtered by the version_created_by column
 * @method     ChildBallot[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildBallot objects filtered by the created_at column
 * @method     ChildBallot[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildBallot objects filtered by the updated_at column
 * @method     ChildBallot[]|ObjectCollection findByVersion(int $version) Return ChildBallot objects filtered by the version column
 * @method     ChildBallot[]|ObjectCollection findByVersionCreatedAt(string $version_created_at) Return ChildBallot objects filtered by the version_created_at column
 * @method     ChildBallot[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BallotQuery extends ModelCriteria
{

    // versionable behavior

    /**
     * Whether the versioning is enabled
     */
    static $isVersioningEnabled = true;
protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \MESBallotBox\Propel\Base\BallotQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\MESBallotBox\\Propel\\Ballot', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBallotQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBallotQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBallotQuery) {
            return $criteria;
        }
        $query = new ChildBallotQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildBallot|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BallotTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BallotTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildBallot A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, user_id, name, start_time, end_time, timezone, version_created_by, created_at, updated_at, version, version_created_at FROM Ballot WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildBallot $obj */
            $obj = new ChildBallot();
            $obj->hydrate($row);
            BallotTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildBallot|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildBallotQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BallotTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBallotQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BallotTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterByid(1234); // WHERE id = 1234
     * $query->filterByid(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterByid(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBallotQuery The current query, for fluid interface
     */
    public function filterByid($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BallotTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BallotTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BallotTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByuserId(1234); // WHERE user_id = 1234
     * $query->filterByuserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByuserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBallotQuery The current query, for fluid interface
     */
    public function filterByuserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(BallotTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(BallotTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BallotTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByname('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByname('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBallotQuery The current query, for fluid interface
     */
    public function filterByname($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BallotTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the start_time column
     *
     * Example usage:
     * <code>
     * $query->filterBystartTime(1234); // WHERE start_time = 1234
     * $query->filterBystartTime(array(12, 34)); // WHERE start_time IN (12, 34)
     * $query->filterBystartTime(array('min' => 12)); // WHERE start_time > 12
     * </code>
     *
     * @param     mixed $startTime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBallotQuery The current query, for fluid interface
     */
    public function filterBystartTime($startTime = null, $comparison = null)
    {
        if (is_array($startTime)) {
            $useMinMax = false;
            if (isset($startTime['min'])) {
                $this->addUsingAlias(BallotTableMap::COL_START_TIME, $startTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startTime['max'])) {
                $this->addUsingAlias(BallotTableMap::COL_START_TIME, $startTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BallotTableMap::COL_START_TIME, $startTime, $comparison);
    }

    /**
     * Filter the query on the end_time column
     *
     * Example usage:
     * <code>
     * $query->filterByendTime(1234); // WHERE end_time = 1234
     * $query->filterByendTime(array(12, 34)); // WHERE end_time IN (12, 34)
     * $query->filterByendTime(array('min' => 12)); // WHERE end_time > 12
     * </code>
     *
     * @param     mixed $endTime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBallotQuery The current query, for fluid interface
     */
    public function filterByendTime($endTime = null, $comparison = null)
    {
        if (is_array($endTime)) {
            $useMinMax = false;
            if (isset($endTime['min'])) {
                $this->addUsingAlias(BallotTableMap::COL_END_TIME, $endTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endTime['max'])) {
                $this->addUsingAlias(BallotTableMap::COL_END_TIME, $endTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BallotTableMap::COL_END_TIME, $endTime, $comparison);
    }

    /**
     * Filter the query on the timezone column
     *
     * Example usage:
     * <code>
     * $query->filterBytimezone(1234); // WHERE timezone = 1234
     * $query->filterBytimezone(array(12, 34)); // WHERE timezone IN (12, 34)
     * $query->filterBytimezone(array('min' => 12)); // WHERE timezone > 12
     * </code>
     *
     * @param     mixed $timezone The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBallotQuery The current query, for fluid interface
     */
    public function filterBytimezone($timezone = null, $comparison = null)
    {
        if (is_array($timezone)) {
            $useMinMax = false;
            if (isset($timezone['min'])) {
                $this->addUsingAlias(BallotTableMap::COL_TIMEZONE, $timezone['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timezone['max'])) {
                $this->addUsingAlias(BallotTableMap::COL_TIMEZONE, $timezone['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BallotTableMap::COL_TIMEZONE, $timezone, $comparison);
    }

    /**
     * Filter the query on the version_created_by column
     *
     * Example usage:
     * <code>
     * $query->filterByversionCreatedBy(1234); // WHERE version_created_by = 1234
     * $query->filterByversionCreatedBy(array(12, 34)); // WHERE version_created_by IN (12, 34)
     * $query->filterByversionCreatedBy(array('min' => 12)); // WHERE version_created_by > 12
     * </code>
     *
     * @param     mixed $versionCreatedBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBallotQuery The current query, for fluid interface
     */
    public function filterByversionCreatedBy($versionCreatedBy = null, $comparison = null)
    {
        if (is_array($versionCreatedBy)) {
            $useMinMax = false;
            if (isset($versionCreatedBy['min'])) {
                $this->addUsingAlias(BallotTableMap::COL_VERSION_CREATED_BY, $versionCreatedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($versionCreatedBy['max'])) {
                $this->addUsingAlias(BallotTableMap::COL_VERSION_CREATED_BY, $versionCreatedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BallotTableMap::COL_VERSION_CREATED_BY, $versionCreatedBy, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBallotQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(BallotTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(BallotTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BallotTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBallotQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(BallotTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(BallotTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BallotTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query on the version column
     *
     * Example usage:
     * <code>
     * $query->filterByVersion(1234); // WHERE version = 1234
     * $query->filterByVersion(array(12, 34)); // WHERE version IN (12, 34)
     * $query->filterByVersion(array('min' => 12)); // WHERE version > 12
     * </code>
     *
     * @param     mixed $version The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBallotQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(BallotTableMap::COL_VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(BallotTableMap::COL_VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BallotTableMap::COL_VERSION, $version, $comparison);
    }

    /**
     * Filter the query on the version_created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByVersionCreatedAt('2011-03-14'); // WHERE version_created_at = '2011-03-14'
     * $query->filterByVersionCreatedAt('now'); // WHERE version_created_at = '2011-03-14'
     * $query->filterByVersionCreatedAt(array('max' => 'yesterday')); // WHERE version_created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $versionCreatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBallotQuery The current query, for fluid interface
     */
    public function filterByVersionCreatedAt($versionCreatedAt = null, $comparison = null)
    {
        if (is_array($versionCreatedAt)) {
            $useMinMax = false;
            if (isset($versionCreatedAt['min'])) {
                $this->addUsingAlias(BallotTableMap::COL_VERSION_CREATED_AT, $versionCreatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($versionCreatedAt['max'])) {
                $this->addUsingAlias(BallotTableMap::COL_VERSION_CREATED_AT, $versionCreatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BallotTableMap::COL_VERSION_CREATED_AT, $versionCreatedAt, $comparison);
    }

    /**
     * Filter the query by a related \MESBallotBox\Propel\Voter object
     *
     * @param \MESBallotBox\Propel\Voter|ObjectCollection $voter the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBallotQuery The current query, for fluid interface
     */
    public function filterByVoter($voter, $comparison = null)
    {
        if ($voter instanceof \MESBallotBox\Propel\Voter) {
            return $this
                ->addUsingAlias(BallotTableMap::COL_ID, $voter->getballotId(), $comparison);
        } elseif ($voter instanceof ObjectCollection) {
            return $this
                ->useVoterQuery()
                ->filterByPrimaryKeys($voter->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVoter() only accepts arguments of type \MESBallotBox\Propel\Voter or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Voter relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildBallotQuery The current query, for fluid interface
     */
    public function joinVoter($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Voter');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Voter');
        }

        return $this;
    }

    /**
     * Use the Voter relation Voter object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MESBallotBox\Propel\VoterQuery A secondary query class using the current class as primary query
     */
    public function useVoterQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVoter($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Voter', '\MESBallotBox\Propel\VoterQuery');
    }

    /**
     * Filter the query by a related \MESBallotBox\Propel\Question object
     *
     * @param \MESBallotBox\Propel\Question|ObjectCollection $question the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBallotQuery The current query, for fluid interface
     */
    public function filterByQuestion($question, $comparison = null)
    {
        if ($question instanceof \MESBallotBox\Propel\Question) {
            return $this
                ->addUsingAlias(BallotTableMap::COL_ID, $question->getballotId(), $comparison);
        } elseif ($question instanceof ObjectCollection) {
            return $this
                ->useQuestionQuery()
                ->filterByPrimaryKeys($question->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByQuestion() only accepts arguments of type \MESBallotBox\Propel\Question or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Question relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildBallotQuery The current query, for fluid interface
     */
    public function joinQuestion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Question');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Question');
        }

        return $this;
    }

    /**
     * Use the Question relation Question object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MESBallotBox\Propel\QuestionQuery A secondary query class using the current class as primary query
     */
    public function useQuestionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinQuestion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Question', '\MESBallotBox\Propel\QuestionQuery');
    }

    /**
     * Filter the query by a related \MESBallotBox\Propel\Vote object
     *
     * @param \MESBallotBox\Propel\Vote|ObjectCollection $vote the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBallotQuery The current query, for fluid interface
     */
    public function filterByVote($vote, $comparison = null)
    {
        if ($vote instanceof \MESBallotBox\Propel\Vote) {
            return $this
                ->addUsingAlias(BallotTableMap::COL_ID, $vote->getballotId(), $comparison);
        } elseif ($vote instanceof ObjectCollection) {
            return $this
                ->useVoteQuery()
                ->filterByPrimaryKeys($vote->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVote() only accepts arguments of type \MESBallotBox\Propel\Vote or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Vote relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildBallotQuery The current query, for fluid interface
     */
    public function joinVote($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Vote');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Vote');
        }

        return $this;
    }

    /**
     * Use the Vote relation Vote object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MESBallotBox\Propel\VoteQuery A secondary query class using the current class as primary query
     */
    public function useVoteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVote($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Vote', '\MESBallotBox\Propel\VoteQuery');
    }

    /**
     * Filter the query by a related \MESBallotBox\Propel\BallotVersion object
     *
     * @param \MESBallotBox\Propel\BallotVersion|ObjectCollection $ballotVersion the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBallotQuery The current query, for fluid interface
     */
    public function filterByBallotVersion($ballotVersion, $comparison = null)
    {
        if ($ballotVersion instanceof \MESBallotBox\Propel\BallotVersion) {
            return $this
                ->addUsingAlias(BallotTableMap::COL_ID, $ballotVersion->getid(), $comparison);
        } elseif ($ballotVersion instanceof ObjectCollection) {
            return $this
                ->useBallotVersionQuery()
                ->filterByPrimaryKeys($ballotVersion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBallotVersion() only accepts arguments of type \MESBallotBox\Propel\BallotVersion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BallotVersion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildBallotQuery The current query, for fluid interface
     */
    public function joinBallotVersion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BallotVersion');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'BallotVersion');
        }

        return $this;
    }

    /**
     * Use the BallotVersion relation BallotVersion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MESBallotBox\Propel\BallotVersionQuery A secondary query class using the current class as primary query
     */
    public function useBallotVersionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBallotVersion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BallotVersion', '\MESBallotBox\Propel\BallotVersionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBallot $ballot Object to remove from the list of results
     *
     * @return $this|ChildBallotQuery The current query, for fluid interface
     */
    public function prune($ballot = null)
    {
        if ($ballot) {
            $this->addUsingAlias(BallotTableMap::COL_ID, $ballot->getid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Ballot table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BallotTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BallotTableMap::clearInstancePool();
            BallotTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BallotTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BallotTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BallotTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BallotTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildBallotQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(BallotTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildBallotQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(BallotTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildBallotQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(BallotTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildBallotQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(BallotTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildBallotQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(BallotTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildBallotQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(BallotTableMap::COL_CREATED_AT);
    }

    // versionable behavior

    /**
     * Checks whether versioning is enabled
     *
     * @return boolean
     */
    static public function isVersioningEnabled()
    {
        return self::$isVersioningEnabled;
    }

    /**
     * Enables versioning
     */
    static public function enableVersioning()
    {
        self::$isVersioningEnabled = true;
    }

    /**
     * Disables versioning
     */
    static public function disableVersioning()
    {
        self::$isVersioningEnabled = false;
    }

} // BallotQuery
